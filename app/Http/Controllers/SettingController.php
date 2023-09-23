<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Travel;
use App\Models\Plan;
use App\Models\User;



class SettingController extends Controller
{
     public function show()
    {
       $user = auth()->user(); // 現在認証されているユーザーを取得
        $travelList = Travel::where('user_id', \Auth::id())->get();
        
        
        return view('user.travel.setting',['travelList' => $travelList,'user' =>$user]);
    }
    
     public function edit($user_id)
    {
       $user = auth()->user(); // 現在認証されているユーザーを取得
       if (empty($user)) {
            abort(404);
        }
        $travelList = Travel::where('user_id', \Auth::id())->get();
        
        return view('user.travel.setting_edit',['user' =>$user,'travelList'=>$travelList]);
    }
    
    public function update(Request $request)
     {
        $this->validate($request,User::$rules);//validationで検証
        $user = User::find($request->user_id);//userモデルから元データを取得する
        // dd($user);
       if (empty($user)) {
            abort(404);
        }
        unset($user['_token']);
        $user->timestamps = false;
        $user->name = $request->name;
        // dd($user);
        $user->email = $request->email;
        if($request->password){
         $user->password =bcrypt($request->new_password);
        }
        
        // dd($user);
        
        $user->save();//＄userを新しいデータで上書き保存
        $travelList = Travel::where('user_id', \Auth::id())->get();
        
        return redirect()->route('setting.show',['travelList' => $travelList,'user' =>$user]);
    }
} 