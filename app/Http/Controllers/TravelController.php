<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function add()
    {
        return view('user.travel.planning');
    }
}
