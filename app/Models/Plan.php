<?php

namespace App\Models;
use Carbon\Carbon;
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
   public function getPlanDateAttribute($date)
    {
        return Carbon::parse($date)->format('m-d');  // 日付のフォーマットを指定
    }

    public function getFromTimeAttribute($time)
    {
        return Carbon::parse($time)->format('H:i');  // 時間のフォーマットを指定
    }

    public function getEndTimeAttribute($time)
    {
        return Carbon::parse($time)->format('H:i');  // 時間のフォーマットを指定
    }
    
}
