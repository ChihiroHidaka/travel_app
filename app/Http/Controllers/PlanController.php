<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plan;
use App\Models\Travel;



class PlanController extends Controller
{
    
    public function create($travel_id)
   {
       
    $travel = Travel::find($travel_id);
    $plans = Plan::where('travel_id', $travel_id)->get();//travel_id= 3の行程表を取り出す
    
    return view('user.travel.plan',['plans' => $plans,'travel_id' =>$travel_id]);
    
   }
   
   
  
   public function store(Request $request)
   {
        
        $this->validate($request, Plan::$rules);
        // dd('plan_storeが呼ばれた');//動作の確認用
        $plan = new Plan;
        $plan_form = $request->all();
       
        unset($plan_form['_token']);

        $plan->fill($plan_form);
        $plan->user_id = \Auth::id();
        $plan->timestamps = false;
        $plan->travel_id = $request->travel_id;
        $plan->save();
        
        
        return redirect()->route('plan.create', ['travel_id'=>$request->travel_id]);
    }
    
    
     public function edit(Request $request)
    {
        $plan = Plan::find($request ->id);
        return redirect('user.travel.edit');
    }
    
    
    
    public function update()
    {
        
        
        
    }
        
        
        
   public function index(Request $request)
    {
        
    }
    
    
}


