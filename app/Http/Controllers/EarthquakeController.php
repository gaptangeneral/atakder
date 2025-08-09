<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class EarthquakeController extends Controller
{
    public function index()
    {
        $start = now()->subDays(7)->format('Y-m-d\TH:i:s');
        $end = now()->format('Y-m-d\TH:i:s');
        
        $url = "https://deprem.afad.gov.tr/apiv2/event/filter";
        $response = Http::timeout(10)->get($url, [
            'start' => $start,
            'end' => $end,
            'limit' => 10,
            'orderby' => 'timedesc',
            'format' => 'json',
        ]);
        
        if ($response->successful()) {
            $data = $response->json();
            $earthquakes = [];

            if (isset($data['result'])) {
                foreach ($data['result'] as $eq) {
                    $timeStr = $eq['time'] ?? null;
                    $formattedTime = $timeStr ? Carbon::parse($timeStr)->format('Y-m-d H:i:s') : 'Bilinmiyor';

                    $earthquakes[] = [
                        'location' => $eq['location'] ?? ($eq['lokasyon'] ?? 'Bilinmiyor'),
                        'depth' => $eq['depth'] ?? ($eq['derinlik'] ?? 0),
                        'type' => $eq['magType'] ?? ($eq['tip'] ?? 'Bilinmiyor'),
                        'magnitude' => $eq['magnitude'] ?? ($eq['buyukluk'] ?? 0),
                        'time' => $formattedTime,
                    ];
                }
            } else {
                $earthquakes = $data;
            }

            return response()->json($earthquakes);
        } else {
            return response()->json(['error' => 'AFAD API’den veri alınamadı.'], 500);
        }
    }
}
