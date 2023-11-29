<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityGetRequest;
use App\Interfaces\WeatherInterface;
use Illuminate\Http\JsonResponse;

class WeatherController extends Controller
{
    private WeatherInterface $driver;

    public function __construct(WeatherInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * Получает и отдаёт температуру для заданного города
     *
     * @param CityGetRequest $request
     * @return JsonResponse
     */
    public function getForCity(CityGetRequest $request): JsonResponse
    {
        return response()->json($this->driver->getForCity($request->city));
    }
}
