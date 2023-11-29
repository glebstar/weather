<?php
namespace App\Drivers;

use App\Interfaces\WeatherInterface;
use Illuminate\Support\Facades\Http;

class OpenWeatherMapDriver implements WeatherInterface
{

    /**
     * Get Weather for City
     *
     * @param string $city
     * @return array
     */
    public function getForCity(string $city): array
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/forecast?q=' . $city . '&appid=' . config('app.owm_api_key') . '&lang=ru&units=metric');
        $result = [];
        $format = 'Температура: %s, ветер: %s м/с, %s';

        $weather = $response->json();

        if (isset($weather['list'])) {
            foreach ($weather['list'] as $w) {
                $result[$w['dt_txt']] = sprintf($format, $w['main']['temp'], $w['wind']['speed'], $w['weather'][0]['description']);
            }
        }

        return $result;
    }
}
