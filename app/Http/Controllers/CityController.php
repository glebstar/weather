<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityCreateRequest;
use App\Models\City;

class CityController extends Controller
{
    public function create(CityCreateRequest $request)
    {
        City::updateOrCreate([
            'name' => $request->name,
        ]);
    }
}
