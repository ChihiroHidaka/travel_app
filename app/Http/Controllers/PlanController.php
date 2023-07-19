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
    
    public function edit($plan_id)//受け取りたい変数をルーティングのパラメーターで定義
    {
        $plan = Plan::find($plan_id);
        return view('user.travel.plan_edit',['plan'=>$plan]);
    }
    
    
    public function update(Request $request)//行程表の編集画面からの更新（保存）
    {
        
        $this->validate($request,Plan::$rules);//validationで検証
        
        $plan = Plan::find($request->id);//Planモデルから元データを取得する
        dd($plan->id);
       

        $plan_form = $request->all();//送信された新しいデータを全て＄plan_formに格納
         dd($plan_form);
         
        unset($plan_form['_token']);
        
        $plan->fill($plan_form)->save();//＄planを＄plan_formのデータで上書き保存
        
        return redirect()->route('plan.create');
    }
    
    
    public function delete(Request $request)//各工程の削除
    {
        // dd('OK');//動作の確認用
        $plan = Plan::find($request->id);
        $plan->delete();
        return redirect()->route('plan.create');
    }
    
}


