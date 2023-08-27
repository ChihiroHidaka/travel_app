<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Travel;
use App\Models\Plan;



class SettingController extends Controller
{
    
        
    public function show(Request $request)//各旅行の概要表示
    {
        $travelList = Travel::where('user_id', \Auth::id())->get();
        $travel = Travel::find($request->id);
        $plans = Plan::where('travel_id', $request->id)->get();// Planモデルのデータから、travel_idがリクエストで送られてきたid（$request->id）と一致するレコードを全て取得
        
        return view('user.travel.show',['travelList' => $travelList, 'travel' => $travel,'plans' => $plans]);
    

    
  
    public function edit(Request $request)//旅行概要の編集画面に飛ぶアクション
    {
        
        $travel = Travel::find($request->id);
        return view('user.travel.travel_edit',['travel' => $travel]);
        
        // if(empty($travel)){
        //     abort(404);
    }
    
    
    public function update(Request $request)//旅行概要編集画面からの更新（保存）
    {
        
        $this->validate($request,Travel::$rules);//validationで検証
        
        $travel = Travel::find($request->id);//Travelモデルから元データを取得する

        $form = $request->all();//送信された新しいデータを全て＄formに格納
        
        if($request->remove =='trure'){
            $form['imgae_path'] = null;
        } elseif ($request->file('imgae')){
            $path = $request->file('imgae')->store('public/image');
            $form['image_path'] = basename($path);
        } else{
            $form['image_path'] = $travel->imgae_path;
        }
        unset($form['imgae']);
        unset($form['remove']);
        unset($form['_token']);
        
        $travel->fill($form)->save();//＄travelを＄formのデータで上書き保存
        
        $travelList = Travel::where('user_id', \Auth::id())->get();//ログイン中のユーザ-が所有している旅行のリストをデータベースから取得
        
        return view('user.travel.show',['travelList' => $travelList, 'travel' => $travel]);
        
    }
    
  
}