<?php

namespace App\Http\Controllers;

use App\Models\City;


class HomeController extends Controller
{
    public function index()
    {
        return view('tables');
    }
    public function fetchCity()
    {
        $city = City::skip(0)
            ->take(10)
            ->get();
        return response()->json(['data' => $city]);
    }
}
