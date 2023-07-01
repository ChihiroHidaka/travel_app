<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Travel;



class TravelController extends Controller
{
    public function index()
    {
        $travelList = Travel::where('user_id', \Auth::id())->get();
        // dd($travels);
        return view('user.travel.travel', ['travelList' => $travelList]);//連想配列　左がわは文字列で名前、右側は実データ
    }
    
  
    
    public function show($id)
    {
        $travelList = Travel::where('user_id', \Auth::id())->get();
        $travel = Travel::find($id);
        return view('user.travel.show',['travelList' => $travelList],['travel' =>$travel]);
    }
    
    
    public function store(Request $request)
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
    
    
      public function create()
    {
        return view('user.travel.travel_edit');
    }
    
    
    //旅行概要hの編集画面に飛ぶアクション
    public function edit(Requet $request)
    {
        $travel = Travel::find($request->id);
        if(empty($travel)){
            abort(404);
        }
        return view('user.travel.travel_edit', ['travel_edit'=>$travel]);
    }
    
    
    //旅行概要の編集・更新アクション
    public function update(Request $request)
    {
        //validation
        $this->validate($request,Travel::$rules);
        //Travelモデルからデータを取得する
        $travel = Travel::find($request->id);
        //送信されたデータを格納
        $travel_list = $request->all();
        unset($travel_list['_token']);
        
        $travel->fill($travel_edit)->save();
        
        return view('user.travel.show',['travelList' => $travelList],['travel' =>$travel]);
        
    }
    
    
    // public function index(Request $request)
    // {
    //   $traveldata = Travel::all();
    //   return view('user.travel.travel',['traveldata' => $traveldata]);
        
    // }
    

}