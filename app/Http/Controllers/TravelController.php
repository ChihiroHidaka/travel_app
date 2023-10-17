<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Travel;
use App\Models\Plan;



class TravelController extends Controller
{
    
     public function index()//ホーム画面表示
    {
        // travelモデルの中からuser_idに紐づくAuthのidと一致するデータを持ってくる。
        $travelList = Travel::where('user_id', \Auth::id())->get();
        
        return view('user.travel.travelhome', ['travelList' => $travelList]);//連想配列　左側は文字列で名前、右側は実データ
    }
    
     public function create()//旅行概要の新規作成画面へ
    {
        $travelList = Travel::where('user_id', \Auth::id())->get();
        return view('user.travel.travel',['travelList' => $travelList]);
    }
    
    public function store(Request $request)//各旅行の保存
    {
        $this->validate($request, Travel::$rules);
        $travel = new Travel;
        $form = $request->all();
        
        if(isset($form['image'])){//投稿画面で画像を選択していれば$form[’image’]にデータが入り、選択していなければnull
            $path = $request->file('image')->store('public/image');
            $travel->image_path = basename($path);//$pathの中は「public/image/ハッシュ化されたファイル名」
        }else{
            $travel->image_path = null;
        }
        unset($form['_token']);//不要なtokenを削除
        unset($form['image']);//不要なimageを削除
        
    
        $travel->fill($form);//$travelオブジェクトのfiillメソッドを呼び出す
        $travel->user_id = \Auth::id();
        $travel->group_id = 1;
        $travel->save();
        
        return redirect('/home');//user/travel/home'に遷移
    }
    
    public function show(Request $request)//各旅行の概要と行程表を表示する
    {
        $travelList = Travel::where('user_id', \Auth::id())->get();
        $travel = Travel::find($request->id);
        // Planモデルのデータから、travel_idがリクエストで送られてきたid（$request->id）と一致するレコードを全て取得
        $plans = Plan::where('travel_id', $request->id)->get();
        
        return view('user.travel.show',['travelList' => $travelList, 'travel' => $travel,'plans' => $plans]);
    }
    
    
    public function edit(Request $request)//旅行概要の編集画面に遷移する
    {
        $travel = Travel::find($request->id);
        if (empty($travel)) {
            abort(404);
        }
        $travelList = Travel::where('user_id', \Auth::id())->get();
        
        return view('user.travel.travel_edit',['travel' => $travel,'travelList'=>$travelList]);
    }
    
    
    public function update(Request $request)//旅行概要編集画面からの更新（保存）
    {
        //validationで検証
        $this->validate($request,Travel::$rules);
        //Travelモデルから元データを取得する
        $travel = Travel::find($request->id);
        //送信された新しいデータを全て＄formに格納
        $form = $request->all();
        
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
        //＄travelを＄formのデータで上書き保存
        $travel->fill($form)->save();
        ///ログイン中のユーザ-が所有している旅行のリストをデータベースから取得
        $travelList = Travel::where('user_id', \Auth::id())->get();
        $plans = Plan::where('travel_id', $request->id)->get();
        
        return view('user.travel.show',['travelList' => $travelList, 'travel' => $travel , 'plans' => $plans]);
    }
    
    public function delete(Request $request)//旅行概要の削除
    {
        $travel = Travel::find($request->id);
        $travel->delete();
        return redirect('/home');
    }
}