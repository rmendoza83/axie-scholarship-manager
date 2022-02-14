<?php

namespace App\Http\Controllers;

use App\Repositories\RoninDemoDataRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Log;

class DemoController extends Controller
{
    private $roninDemoData;

    public function __construct(RoninDemoDataRepositoryInterface $roninDemoData)
    {
        $this->roninDemoData = $roninDemoData;
    }

    private function parseFromGameAPI(string $bodyData)
    {
        $parsedData = collect(json_decode($bodyData, true))->map(function ($item, $key) {
            return [
                'id' => $key,
                'name' => $item['name'],
                'mmr' => $item['mmr'],
                'rank' => $item['rank'],
                'total_slp' => $item['total_slp']
            ];
        });

        return $parsedData;
    }

    private function getDataFromGameAPI(Collection $roninData)
    {
        $api_url = env('GAME_AXIE_API_URL');
        $params = $roninData->implode(',');
        $url = $api_url . $params;
        try {
            $response = Http::get($url);
            $axieData = $this->parseFromGameAPI($response->body());
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $axieData = collect([]);
        }

        return $axieData->toArray();
    }

    private function parseFromTrackerAxieManagement(string $bodyData, $id)
    {
        $parsedData = json_decode($bodyData, true);
        return [
            'id' => $id,
            'name' => $parsedData['name'],
            'mmr' => $parsedData['elo'],
            'rank' => $parsedData['rank'],
            'total_slp' => $parsedData['slp']['total']
        ];
    }

    private function getDataFromTrackerAxieManagement(Collection $roninData)
    {
        $api_url = env('TRACKER_AXIE_MANAGEMENT_API_URL');
        $headers = [
            'content-type' => 'application/json',
            'origin' => 'https://tracker.axie.management'
        ];
        $data = [
            'oauth' => env('OAUTH_KEY')
        ];
        $axieData = collect([]);
        foreach ($roninData as $ronin) {
            $url = $api_url . $ronin;
            try {
                $response = Http::withHeaders($headers)
                    ->post($url, $data);
                if ($response->status() === 200) {
                    $axieData->add($this->parseFromTrackerAxieManagement($response->body(), $ronin));
                }
            } catch (Exception $ex) {
                Log::error($ex->getMessage());
            }
        }

        return $axieData->toArray();
    }

    //
    public function index(Request $request)
    {
        $ronindata = $this->roninDemoData->getList()->map(function ($roninItem) {
            return "0x{$roninItem->ronin_id}";
        });
        $axieData = $this->getDataFromTrackerAxieManagement($ronindata);
        $bodyResult = [
            'data' => array_values($axieData)
        ];

        return response($bodyResult);
    }
}
