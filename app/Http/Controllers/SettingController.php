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
        
        
        return view('user.travel.setting_edit',['user' =>$user]);
    }
    
    
    
} 