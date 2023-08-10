<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Belongs;
use App\Models\Travel;



class BelongingsController extends Controller
{
    
    public function create()
    {
        $belongings = Belongs::where('user_id', \Auth::id())->get();
        $travelList = Travel::where('user_id', \Auth::id())->get();
        
        
        return view('user.travel.belongings',['belongings'=> $belongings, 'travelList'=>$travelList]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, Belongs::$rules);
        $belongings = new Belongs;
        $belongings_form = $request->all();
       
        unset($belongings['_token']);

        $belongings->fill($belongings_form);
        $belongings->user_id = \Auth::id();
        $belongings->checked = 0;

        $belongings->save();
        
         $travelList = Travel::where('user_id', \Auth::id())->get();
        
        return redirect()->route('belongings.create');
    }
    
    
    public function check(Request $request)
    {
        $belongings_form = $request->all(); //checkedのデータだけを送る
        
        $belongings = Belongs::where('user_id',\Auth::id())->get();//ユーザーIDに紐づく持ち物を全て取り出す
        //  dd($belongings);
        foreach($belongings as $value){//＄valueはどの変数名でも可能。$belongingsの値をくりかえしvalueに代入
            $belongs = Belongs::find($value->id);//$valueから各持ち物IDを代入
           
            if(in_array($value->id, $belongings_form['belongings'])){ //配列に存在するデータか確認
                //取り出したIDとチェックボックスと同じなら
                $belongs->checked = true;
            }
            else{
                $belongs->checked = false;
            }
             dd($belongs);
            
        $belongs->save();
        
        }
        
        // $belongings->fill($belongings_form);
        // $belongings->user_id = \Auth::id();
        // $belongings->belongs_name = Belongs::find($request->id);
        
        // $belongings->checked = $request->has('belongings[]')? 1:0;
        // // dd($belongings);
        // $belongings->fill($belongings_form)->save();
        
        // $travelList = Travel::where('user_id', \Auth::id())->get();
        
        return redirect()->route('belongings.create');
    }
}



// ,['belongings'=>$belongings,'travelList'=>$travelList]);