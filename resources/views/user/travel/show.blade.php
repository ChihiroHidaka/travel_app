{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '各旅行概要表示')


{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<!--下記はデータを引っ張って表示させる-->

<div class ="travel">
     <h1>{{$travel->title}}</h1> 
     <ul class = "travelContents">
         <!--<li></li>-->
         <li>開始日：{{$travel->start_date}}</li>
         <li>終了日：{{$travel->end_date}}</li>
         <li> 詳  細 ： {{$travel->description}}</li>
         <li><a href="/user/travel/{{$travel->id}}/edit">旅行概要を編集する</a></li>
         <li><a href="/user/travel/{{$travel->id}}/plan/create">行程表を作成する</a></li>
     </ul>
</div>


<!--下記に行程表を追加すること-->
<div>
    <p class = "planShow">行程表</p>
        <div>
            @foreach($plans as $plan)
             <ul class="Plancreate">
              <li>
                <span class="time" id="fromtime" name="from_time" type="time" value="{{$plan->from_time }}">{{$plan->from_time }}</span>
                <div class="sch_box">
                  <p id="plan" name="[plan" type="text" value="{{$plan->plan}}">{{$plan->plan}}</p>
                  <p id="remarks" name="remarks" type="text" value="{{$plan->remarks}}">
                  メモ：{{$plan->remarks}} </p>
                  <a href="/user/plan/{{$plan->id}}/edit">編集</a>
                  <a href="/user/plan/{{$plan->id}}/delete">削除</a>
               </div>
              </li>
            </ul>
            @endforeach
        </div>
</div>
@endsection