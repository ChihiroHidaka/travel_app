{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '各旅行概要表示')


{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<!--下記はデータを引っ張って表示させる-->

<div>
     <h1>{{$travel->title}}</h1> 
     <ul>
         <!--<li></li>-->
         <li>開始日：{{$travel->start_date}}</li>
         <li>終了日：{{$travel->end_date}}</li>
         <li> 詳  細 ： {{$travel->description}}</li>
         <li><a href="/user/travel/{{$travel->id}}/edit">旅行概要を編集する</a></li>
     </ul>
</div>

<p><a href="/user/travel/{{$travel->id}}/plan/create">行程表を作成する</a></p>
<!--下記に行程表を追加すること-->
<div>
    <p>行程表</p>
    　<table id="travelPlan">
        <thead>
            <tr>
                <th>開始時間</th>
                <th>終了時間</th>
                <th>目的地もしくは移動手段</th>
                <th>備考</th>
            </tr>
        </thead>
        
        <tbody>
        @foreach($plans as $plan)
        <p>{{$plan->plan_date}}</p>
        
          <tr class="PlanCreate">
                <td id="fromtime" name="from_time" type="time" value="{{$plan->from_time }}">{{$plan->from_time }}</td>
                <td id="endtime" name="end_time" type="time" value="{{$plan->end_time}}">{{$plan->end_time}}</td>
                <td id="plan" name="[plan" type="text" value="{{$plan->plan}}">{{$plan->plan}}</td>
                <td id="remarks" name="remarks" type="text" value="{{$plan->remarks}}">{{$plan->remarks}}</td>
                <td><a href="/user/plan/{{$plan->id}}/edit">編集</a></td>
                <td><a href="/user/plan/{{$plan->id}}/delete">削除</a></td>
            </tr>

        </tbody>
        </table>
        @endforeach
        
        <div>
             @foreach($plans as $plan)
             <ul class="Plancreate">
              <li>
                <span id="fromtime" name="from_time" type="time" value="{{$plan->from_time }}">{{$plan->from_time }}</span>
                <div class="sch_box">
                  <p id="plan" name="[plan" type="text" value="{{$plan->plan}}">{{$plan->plan}}</p>
                  <p id="remarks" name="remarks" type="text" value="{{$plan->remarks}}">
                  {{$plan->remarks}} </p>
                  <br><a href="/user/plan/{{$plan->id}}/edit">編集</a>
                  <br><a href="/user/plan/{{$plan->id}}/delete">削除</a>
                  <br>
                 
               </div>
              </li>

            </ul>
        </div>
        
       
        
        
        
        
        
        
        
        
        
        
        
</div>
@endsection