{{-- layouts/menu.blade.phpを読み込む --}}
@extends('layouts.menu')

{{-- menu.blade.phpの@yield('title')に埋め込む --}}
@section('title', '各旅行概要表示')

{{-- menu.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<!--travel.blade.phpで入力したデータを表示させる-->
<h1>{{$travel->title}}</h1> 
<div class ="inputContents">
    <div>・開始日：{{$travel->start_date}}</div>
    <div>・終了日：{{$travel->end_date}}</div>
    <div>・詳  細 ： {{$travel->description}}</div>
    <a href="/user/travel/{{$travel->id}}/edit">旅行概要を編集する</a><br>
    <a href="/user/travel/{{$travel->id}}/plan/create">行程表を作成する（下に表示されます）</a>
</div>
<!--下記にplan.blade.phpで入力した行程表を表示-->
<div>
    <h2 class = "planShow">行程表</h2>
        <div class = "planBackground">
            <ul class="Plancreate">
                @foreach($plans as $plan)
                <li>
                    <div class="day" id="day" name="plan_date" type="date" value="{{$plan->plan_date}}">{{$plan->plan_date}}</div>
                    <div class="time" id="fromtime" name="from_time" type="time" value="{{$plan->from_time}}">{{$plan->from_time }} ~</div>
                    <div class="time" id="endtime" name="end_time" type="time" value="{{$plan->end_time}}">{{$plan->end_time }}</div>
                    <div class="area">
                        <div class="sch_box">
                            <p id="plan" name="plan" type="text" value="{{$plan->plan}}">{{$plan->plan}}</p>
                            <div id="remarks" name="remarks" type="text" value="{{$plan->remarks}}">メモ：{{$plan->remarks}}</div>
                            <a href="/user/plan/{{$plan->id}}/edit">編集</a>
                            <a href="/user/plan/{{$plan->id}}/delete">削除</a>
                        </div>
                    </div>
                </li>
               @endforeach
            </ul>
        </div>
</div>
@endsection