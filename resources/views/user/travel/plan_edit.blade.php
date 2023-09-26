{{-- layouts/menu.blade.phpを読み込む --}}
@extends('layouts.menu')

{{-- menu.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '各行程の編集')

{{-- menu.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<h1>行程表を編集する</h1>

<form method="POST" action="{{ route('plan.update',['plan_id'=>$plan->id])}}" id="planForm">
<input type="hidden" name="plan_id" value="{{$plan->id}}"/>
    @csrf
   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
   <div class = "inputContents">
        <label>日付</label>
        <input id="day" name="plan_date" type="date" value="{{$plan->plan_date }}"></input>
        　　<table id="travelPlan">
            <thead>
                <tr>
                    <th>開始時間</th>
                    <th>終了時間</th>
                    <th>内容</th>
                    <th>メモ</th>
                </tr>
            </thead>
            <tbody>
                <tr class="PlanCreate">
                    <td><input id="fromtime" name="from_time" type="time" value="{{$plan->fromtime }}"></td>
                    <td><input id="endtime" name="end_time" type="time" value="{{$plan->end_time }}"></td>
                    <td><input id="plan" name="plan" type="text" value="{{ $plan->plan }}"></td>
                    <td><input id="remarks" name="remarks" type="text" value="{{ $plan->remarks }}"></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <button style = "margin-top:10px;margin-left:40px;"type="submit">行程を更新する</button></br>
</form>
@endsection


