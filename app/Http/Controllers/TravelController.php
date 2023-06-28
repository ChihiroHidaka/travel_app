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
    
    public function create()
    {
        return view('user.travel.travel_edit');
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
    
    
    public function edit()
    {
        return view('user.travel.travel_edit');
    }
    
    
    public function update()
    {
        
    }
    
    
    // public function index(Request $request)
    // {
    //   $traveldata = Travel::all();
    //   return view('user.travel.travel',['traveldata' => $traveldata]);
        
    // }
    

}