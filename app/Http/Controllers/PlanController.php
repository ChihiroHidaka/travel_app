<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plan;



class PlanController extends Controller
{
   public function store(Request $request)
    {
        
        $this->validate($request, Plan::$rules);
        $plan = new Plan;
        $form = $request->all();//まだ理解できていない
        
        if(isset($form['image'])){
            $path = $request->file('image')->store('public/image');
            $plan->image_path = basename($path);
        }else{
            $plan->imagae_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        
        $plan->fill($store);
        $plan->save();
        
        
        // dd('storeが呼ばれた');//動作の確認用
        return redirect('user/travel/create');
    }
        
        
        
    public function delete(Request $request)
    {
        return redirect('user/travel/create');
    }
    
    
}


