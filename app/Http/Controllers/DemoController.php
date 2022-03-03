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

    private function parseFromTrackerAxieManagement(string $bodyData, $ronin)
    {
        $parsedData = json_decode($bodyData, true);
        $name = strlen(trim($parsedData['name'])) > 0 ? $parsedData['name'] : $ronin['name'];
        return [
            'id' => $ronin['ronin_address'],
            'name' => $name,
            'mmr' => $parsedData['elo'],
            'rank' => $parsedData['rank'],
            'win_rate' => $parsedData['winRate'] . '%',
            'total_slp' => $parsedData['slp']['total'],
            'today_slp' => $parsedData['slp']['today'],
        ];
    }

    private function getDataFromTrackerAxieManagement(Collection $roninData)
    {
        $api_url = env('TRACKER_AXIE_MANAGEMENT_API_URL', 'https://api.axie.management/v1/stats/');
        $headers = [
            'content-type' => 'application/json',
            'origin' => 'https://tracker.axie.management'
        ];
        $data = [
            'oauth' => env('OAUTH_KEY', '5knhmutm3FZpk8irmQ2AP6WXfHA3')
        ];
        $axieData = collect([]);
        foreach ($roninData as $ronin) {
            $url = $api_url . $ronin['ronin_address'];
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
            return [
                'ronin_address' => "0x{$roninItem->ronin_id}",
                'name' => $roninItem->name
            ];
        });
        $axieData = $this->getDataFromTrackerAxieManagement($ronindata);
        $bodyResult = [
            'data' => array_values($axieData)
        ];

        return response($bodyResult);
    }
}
