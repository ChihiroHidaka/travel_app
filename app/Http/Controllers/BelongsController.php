<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Belong;

class BelongsContolelr extends Contoller
{
    public function create()
    {
        $belongings = Belongings::where('user_id', \Auth::id())->get();
        return view('user.travel.belongs',['belongings'=> $belongings]);
    }
}
