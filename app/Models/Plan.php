<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
        'plan_date' => 'required',
        'from_time' => 'required',
        'end_time' => 'required',
        'plan'=>'required',
        
    );
    
}
