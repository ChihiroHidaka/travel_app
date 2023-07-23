<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Travel;



class TravelController extends Controller
{
    
     public function index()//ホーム画面表示
    {
        $travelList = Travel::where('user_id', \Auth::id())->get();
        // dd($travels);
        return view('user.travel.travelhome', ['travelList' => $travelList]);//連想配列　左がわは文字列で名前、右側は実データ
    }
    
    
     public function create()//旅行概要の新規作成画面へ
    {
        $travelList = Travel::where('user_id', \Auth::id())->get();
        return view('user.travel.travel',['travelList' => $travelList]);
    }
    


    public function store(Request $request)//旅行の保存
    {
        // dd('plan_storeが呼ばれた');//動作の確認用
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
        
        
        return redirect('/home');//user/travel/home'に飛ぶ
    }
    
    
      
    public function show(Request $request)//各旅行の概要表示
    {
        $travelList = Travel::where('user_id', \Auth::id())->get();
        $travel = Travel::find($request->id);
        
        return view('user.travel.show',['travelList' => $travelList, 'travel' => $travel]);
    }
    
    
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
    
    
    public function delete(Request $request)//旅行概要の削除
    {
        // dd('OK');//動作の確認用
        $travel = Travel::find($request->id);
        $travel->delete();
        return redirect('/home');
    }
    
    
    
}