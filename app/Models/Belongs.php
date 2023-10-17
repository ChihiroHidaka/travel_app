<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belongs extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
        'belongs_name' => 'required|max:15',
        
    );
    
   
    
}
