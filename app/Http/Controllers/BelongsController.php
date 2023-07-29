<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Belong;

class BelongingsContolelr extends Contoller
{
    public function create()
    {
        $belongings = Belongings::where('user_id', \Auth::id())->get();
        
        return view('user.travel.belongings',['belongings'=> $belongings]);
    }
    
    public function store(Request $request)
    {
         $this->validate($request, Belongings::$rules);
        // dd('plan_storeが呼ばれた');//動作の確認用
        $belongings = new Belongings;
        $belongings_form = $request->all();
       
        unset($belongings['_token']);

        $belongings->fill($belongings_form);
        $belongings->user_id = \Auth::id();
        $belongings->timestamps = false;
        $belongings->save();
        
        return redirect()->route('belongings.create',['belongings'=>$belongings]);
    }
}
