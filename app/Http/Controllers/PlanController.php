<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plan;



class PlanController extends Controller
{
    public function create($travelId)
   {
    return view('user.travel.plan',['travelId' => $travelId]);
   }
   
   
   
   public function store(Request $request)
    {
        // dd('plan_storeが呼ばれた');//動作の確認用
        $this->validate($request, Plan::$rules);
        $plan = new Plan;
        $form = $request->all();
       
        unset($form['_token']);
        
        $plan->fill($form);
        $plan->user_id = \Auth::id();
        $plan->group_id = 1;
        $plan->save();
        
        $travelPlan = Plan::where('id', $plan->id)->get(); 
        $request ->session()->flash('travelPlan',$travelPlan);
    
        return redirect()->back();
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


