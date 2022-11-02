<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Poktan as PoktanResource;
use App\Models\Poktan;

class PoktanController extends Controller
{
    public function index(Request $request)
    {
        $poktan = Poktan::all();

        $geoJSONdata = $poktan->map(function ($poktan)
        {
            return [
                'type' => 'Feature',
                'properties' => new PoktanResource($poktan),
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        $poktan->logitude,
                        $poktan->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type' => 'PoktanCollection',
            'features' => $geoJSONdata,
        ]);
    }

    public function show(Place $place)
    {
        return view('places.detail', [
            'place' => $place,
        ]);
    }
}
