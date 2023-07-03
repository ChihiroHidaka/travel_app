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
        $form = $request->all();//まだ理解できていない
        
        if(isset($form['image'])){
            $path = $request->file('image')->store('public/image');
            $travel->image_path = basename($path);
        }else{
            $travel->image_path = null;
        }
        unset($form['_token']);
        unset($form['image']);
        
    
        $travel->fill($form);
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
        //validation
        $this->validate($request,Travel::$rules);
        //Travelモデルからデータを取得する
        $travel = Travel::find($request->id);
        // dd('plan_storeが呼ばれた');//動作の確認用
        //送信されたデータを格納
        $travel_list = $request->all();
        unset($travel_list['_token']);
        
        $travel->fill($travel_edit)->save();
        
        return view('user.travel.show',['travelList' => $travelList],['travel' =>$travel]);
        
    }
    
    
    

}