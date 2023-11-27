<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityGetRequest;
use App\Drivers\OpenWeatherMapDriver;
use Illuminate\Http\JsonResponse;

class WeatherController extends Controller
{
    /**
     * Получает температуру для заданного города
     *
     * @param CityGetRequest $request
     * @return JsonResponse
     */
    public function getForCity(CityGetRequest $request): JsonResponse
    {
        /**
         * Для смены поставщика температуры изменить эту строку.
         */
        $driver = new OpenWeatherMapDriver();

        return response()->json($driver->getForCity($request->city));
    }
}
