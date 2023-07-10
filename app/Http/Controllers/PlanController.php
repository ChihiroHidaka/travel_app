<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plan;
use App\Models\Travel;



class PlanController extends Controller
{
    
    public function create($travelId)
   {
       
    $travel = Travel::find($travelId);
    //dd($travel);
    return view('user.travel.plan',['travel' => $travel]);
    
   }
   
   
   
   public function store(Request $request)
   {
        // dd('plan_storeが呼ばれた');//動作の確認用
        $this->validate($request, Plan::$rules);
        $plan = new Plan;
        $plan_form = $request->all();
       
        unset($plan_form['_token']);
        
        $plan->fill($plan_form);
        $plan->user_id = \Auth::id();
        $plan->group_id = 1;
        $plan->save();
        
        $travel = Travel::find($travelId);
        
    
        return redirect('/travel/' . $travel->id . '/plan');
    }
    
    
    public function show()
    {
        $plan = Plan::find($request->id);
        return view('travel.user.plan',['plan' => $plan]);
    }
    
    
    
     public function edit()
    {
        return view('user.travel.travel_edit');
    }
    
    public function update()
    {
        
    }
        
   public function index(Request $request)
    {
    }
    
    
}


