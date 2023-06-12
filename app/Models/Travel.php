<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
     protected $guarded = array('id');

     public static $rules = array(
        'title' =>'required',
        'start_date'=>'required',
        'end_date' =>'required',
          
     );
}








