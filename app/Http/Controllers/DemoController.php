<?php

namespace App\Http\Controllers;

use App\Repositories\RoninDemoDataRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DemoController extends Controller
{
    const AXIE_API_URL = 'https://game-api.axie.technology/api/v1/';

    private $roninDemoData;

    public function __construct(RoninDemoDataRepositoryInterface $roninDemoData) {
        $this->roninDemoData = $roninDemoData;
    }

    //
    public function index(Request $request) {
        $data = $this->roninDemoData->getList()->map(function ($roninItem) {
            return "ronin:{$roninItem->ronin_id}";
        });
        $params = $data->implode(',');
        $url = self::AXIE_API_URL . $params;
        $response = Http::get($url);
        $axieData = collect(json_decode($response->body(), true))->map(function ($item, $key) {
            return [
                'id' => $key,
                'name' => $item['name'],
                'mmr' => $item['mmr'],
                'rank' => $item['rank'],
                'total_slp' => $item['total_slp']
            ];
        })->toArray();

        $bodyResult = [
            'data' => array_values($axieData)
        ];
        return response($bodyResult);
    }
}
