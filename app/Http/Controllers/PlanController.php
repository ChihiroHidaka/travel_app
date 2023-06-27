<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plan;



class PlanController extends Controller
{
    public function create()
   {
    return view('user.travel.plan_edit');
   }
   
   public function store(Request $request)
    {
        dd('plan_storeが呼ばれた');//動作の確認用
        $this->validate($request, Plan::$rules);
        $plan = new Plan;
        $form = $request->all();//まだ理解できていない
       
        unset($form['_token']);
        
        $plan->fill($store);
        $plan->save();
        
       
        return redirect('user/travel/home');
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


