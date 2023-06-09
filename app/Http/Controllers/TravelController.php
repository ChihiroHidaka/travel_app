<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function create()
    {
        return view('user.travel.planning');
    }
    
   public function add(Request $request)
    {
        return redirect('user/travel/create');//user/travel/create'に飛ぶ
    }

    public function store()
    {
        return redirect('user/travel/create');
        
    }
    
    public function delete()
    {
        return redirect('user/travel/create');
    }
    
    
}


