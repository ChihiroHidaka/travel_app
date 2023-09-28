<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Travel;


class PlanController extends Controller
{
    public function create($travel_id)
   {
    //各旅行と行程を紐づけるため各旅行IDを取得   
    $travel = Travel::find($travel_id);
    //travel_id= xの行程表を取り出す
    $plans = Plan::where('travel_id', $travel_id)->get();
    //サイドメニューの旅行一覧を取得
    $travelList = Travel::where('user_id', \Auth::id())->get();
    
    return view('user.travel.plan',['plans' => $plans,'travel_id' =>$travel_id,'travelList'=>$travelList]);
    
   }
  
  
   public function store(Request $request)
   {
        $this->validate($request, Plan::$rules);
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
        $travelList = Travel::where('user_id', \Auth::id())->get();
    
        return view('user.travel.plan_edit',['plan'=>$plan,'travelList'=>$travelList]);
    }
    
    
    public function update(Request $request )//行程表の編集画面からの更新（保存）
    {
        
        $this->validate($request,Plan::$rules);
        //Planモデルから元データを取得する
        $plan = Plan::find($request->plan_id);
        // dd($plan->id);
        ///送信された新しいデータを全て＄plan_formに格納
        $plan_form = $request->all();
        // dd($plan_form);
        unset($plan_form['_token']);
        $plan->timestamps = false;
        //＄planを＄plan_formのデータで上書き保存
        $plan->fill($plan_form)->save();
        
        return redirect()->route('plan.create',['travel_id'=>$plan->travel_id]);
    }
    
    
    public function delete(Request $request)//各工程の削除
    {
        $plan = Plan::find($request->plan_id);
        // dd($plan);
        $plan->delete();
        return redirect()->route('plan.create',['travel_id'=>$plan->travel_id]);
    }
    
    
 
}


