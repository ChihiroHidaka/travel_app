<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Travel;
use App\Models\Plan;



class WeatherController extends Controller
{

    public function create()
    {
        $travelList = Travel::where('user_id', \Auth::id())->get();
        return view('user.travel.weather',['travelList' => $travelList]);
    }
    
}