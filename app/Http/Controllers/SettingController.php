<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Travel;
use App\Models\Plan;
use App\Models\User;



class SettingController extends Controller
{
     public function show()// 現在認証されているユーザーを表示させる
    {
     $loginUserData = auth()->user(); 
     $travelList = Travel::where('user_id', \Auth::id())->get();
        
     return view('user.travel.setting',['loginUserData' =>$loginUserData,'travelList' => $travelList]);
    }
    
     public function edit($user_id)
    {
       $loginUserData = auth()->user(); 
       if (empty($loginUserData )) {
            abort(404);
        }
        $travelList = Travel::where('user_id', \Auth::id())->get();
        
        return view('user.travel.setting_edit',['loginUserData' =>$loginUserData,'travelList' => $travelList]);
    }
    
    public function update(Request $request)
     {
        $this->validate($request,User::$rules);
        $loginUserData = User::find($request->user_id);
        // dd($user);
       if (empty($loginUserData )) {
            abort(404);
        }
        unset($loginUserData ['_token']);
        $loginUserData ->timestamps = false;
        $loginUserData ->name = $request->name;
        // dd($user);
        $loginUserData ->email = $request->email;
        if($request->password){
         $loginUserData ->password =bcrypt($request->new_password);
        }
        
        // dd($loginUserData );
        
        $loginUserData ->save();//＄userを新しいデータで上書き保存
        $travelList = Travel::where('user_id', \Auth::id())->get();
        
        return redirect()->route('setting.show',['loginUserData' =>$loginUserData,'travelList' => $travelList]);
    }
} 