<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityGetRequest;
use App\Interfaces\WeatherInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redis;

class WeatherController extends Controller
{
    /**
     * Получает и отдаёт температуру для заданного города
     *
     * @param CityGetRequest $request
     * @return JsonResponse
     */
    public function getForCity(CityGetRequest $request): JsonResponse
    {
        dd(json_decode(Redis::get($request->city), true));

        return response()->json(json_decode(Redis::get($request->city), true));
    }
}
