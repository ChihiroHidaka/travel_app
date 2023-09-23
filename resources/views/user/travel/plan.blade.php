{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '行程表の作成')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<h1>行程表を作成する</h1>
<!--下記からユーザーによるデータ入力-->
<form method="POST" action="{{ route('plan.store',['travel_id' => $travel_id]) }}" id="planForm">
    @csrf
    <!--保存するときにtravel_idと＄traveldを紐づける-->
   <input type="hidden" name="travel_id" value="{{$travel_id}}" />
   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
   <div class = "edit">
       <label>日付</label>
           <input id="day" name="plan_date" type="date"></input>
        　　<table id="travelPlan">
                <thead>
                    <tr>
                        <th>開始時間</th>
                        <th>終了時間</th>
                        <th>内容</th>
                        <th>備考</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="PlanCreate">
                        <td><input id="fromtime" name="from_time" type="time" value="{{ old('from_time') }}"></td>
                        <td><input id="endtime" name="end_time" type="time" value="{{ old('end_time') }}"></td>
                        <td><input id="plan" name="plan" type="text" value="{{ old('plan') }}"></td>
                        <td><input id="remarks" name="remarks" type="text" value="{{ old('remarks') }}"></td>
                    </tr>
                </tbody>
            </table>
        <button type="submit">行程を追加する</button></br>
    </div>    
</form>

<div><a href="/user/travel/{{$travel_id}}">ホーム画面に戻る</a></div>

<div>
    <h2 class = "planShow">行程表</h2>
        <div>
            <ul class="Plancreate">
                 @foreach($plans as $plan)
                <li>
                    <div class="day" id="day" name="plan_date" type="date" value="{{$plan->plan_date}}">{{$plan->plan_date}}</div>
                    <span class="time" id="fromtime" name="from_time" type="time" value="{{$plan->from_time}}">{{$plan->from_time }}</span>
                    <div class="area">
                    <div class="sch_box">
                      <p id="plan" name="plan" type="text" value="{{$plan->plan}}">{{$plan->plan}}</p>
                      <div id="remarks" name="remarks" type="text" value="{{$plan->remarks}}">
                      メモ：{{$plan->remarks}} </div>
                      <a href="/user/plan/{{$plan->id}}/edit">編集</a>
                      <a href="/user/plan/{{$plan->id}}/delete">削除</a>
                    </div>
                </li>
               @endforeach
            </ul>
        </div>
</div>
@endsection


 
