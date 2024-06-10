<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    function index() {
        $cities = City::all();

        return response()->json([
            'success' => true,
            'data'    => $cities,
            'message' => 'All Cities',
        ], 200);
    }
}
