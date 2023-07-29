<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Belongs;
use App\Models\Travel;



class BelongingsController extends Controller
{
    
    public function create()
    {
        $belongings = Belongs::where('user_id', \Auth::id())->get();
        $travelList = Travel::where('user_id', \Auth::id())->get();
        
        
        return view('user.travel.belongings',['belongings'=> $belongings, 'travelList'=>$travelList]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, Belongs::$rules);
        $belongings = new Belongs;
        $belongings_form = $request->all();
       
        unset($belongings['_token']);

        $belongings->fill($belongings_form);
        $belongings->user_id = \Auth::id();
        $belongings->timestamps = false;
        $belongings->save();
        
         $travelList = Travel::where('user_id', \Auth::id())->get();
        
        return redirect()->route('belongings.create',['belongings'=>$belongings,'travelList'=>$travelList]);
    }
}
