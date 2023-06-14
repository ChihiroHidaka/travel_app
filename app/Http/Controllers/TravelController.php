<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Travel;



class TravelController extends Controller
{
    public function add()
    {
        return view('user.travel.planning');
    }
    
   public function create(Request $request)
    {
        return redirect('user/travel/create');//user/travel/create'に飛ぶ
    }

    
}


