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
        $belongings_form = $request->all(); //送信されたのはcheckedの値。checkedのデータだけを送る
        $belongings = Belongs::where('user_id',\Auth::id())->get();//ユーザーIDに紐づく持ち物を全て取り出す
        
        foreach($belongings as $value){//＄valueはどの変数名でも可能。取得した$belongingsをループして、各オブジェクトのchecked値を更新
            $belongs = Belongs::find($value->id);//$valueから各持ち物IDを代入.現在のループで処理するオブジェクトを取得します。
            if(in_array($value->id, $belongings_form['belongings'])){ //送信されたデータ内のbelongings配列に、現在の$valueのIDが存在するか確認します。
                $belongs->checked = true; //送信したcheckedの値と同じI Dがあるならチェックをつける
            }
            else{
                $belongs->checked = false;
            }
        $belongs->save();
        }
        return redirect()->route('belongings.create');
    }

        // $belongings->fill($belongings_form);
        // $belongings->user_id = \Auth::id();
        // $belongings->belongs_name = Belongs::find($request->id);
        
        // $belongings->checked = $request->has('belongings[]')? 1:0;
        // // dd($belongings);
        // $belongings->fill($belongings_form)->save();
        
        // $travelList = Travel::where('user_id', \Auth::id())->get();
        
    public function edit($id)
    {
        $belongings= Belongs::find($id);
        // dd($belongings);

        return view('user.travel.belongings_edit',['belongings'=>$belongings]);
    }
    
    
    public function update(Request $request)
    {
        $this->validate($request, Belongs::$rules);
        $belongings = Belongs::find($request->id);//Belongsモデルから元データを取得する
        $belongings_form = $request->all();
       
        unset($belongings['_token']);

        $belongings->fill($belongings_form);
        $belongings->user_id = \Auth::id();
        $belongings->checked = 0;

        $belongings->fill($belongings_form)->save();
        
        $travelList = Travel::where('user_id', \Auth::id())->get();
        
        
        return redirect()->route('belongings.create');
    }
    
    public function delete($id)
    {
        $belongings = Belongs::find($id);
        $belongings->delete();
        
         return redirect()->route('belongings.create',['id'=>$belongings->id]);
    
    }
    
}