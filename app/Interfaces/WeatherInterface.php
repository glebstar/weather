<?php
namespace App\Interfaces;

interface WeatherInterface
{
    /**
     * Get Weather for City
     *
     * @param string $city
     * @return array
     */
    public function getForCity(string $city): array;
}
