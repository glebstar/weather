<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\CityGetRequest;
use App\Drivers\OpenWeatherMapDriver;

class WeatherController extends Controller
{
    public function getForCity(CityGetRequest $request)
    {
        $driver = new OpenWeatherMapDriver();

        return response()->json($driver->getForCity($request->city));
    }
}
