<?php

namespace App\Console\Commands;

use App\Interfaces\WeatherInterface;
use App\Models\City;
use Illuminate\Console\Command;
use JetBrains\PhpStorm\NoReturn;
use Illuminate\Support\Facades\Redis;

class GetWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Получает погоду по всем зарегистрированным городам из предоставленного провайдера';

    private WeatherInterface $driver;

    public function __construct(WeatherInterface $driver)
    {
        $this->driver = $driver;
        return parent::__construct();
    }

    /**
     * Execute the console command.
     */
    #[NoReturn] public function handle()
    {
        $cities = City::get();

        foreach ($cities as $city) {
            Redis::set($city, json_encode($this->driver->getForCity($city['name'])));
        }
    }
}
