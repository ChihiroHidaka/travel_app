{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.app')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '行程表の作成')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    
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
   
   <label>日付</label>
   <input id="day" name="plan_date" type="date"></input>
   
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
            <tr class="PlanCreate">
                <td><input id="fromtime" name="from_time" type="time" value="{{ old('from_time') }}"></td>
                <td><input id="endtime" name="end_time" type="time" value="{{ old('end_time') }}"></td>
                <td><input id="plan" name="plan" type="text" value="{{ old('plan') }}"></td>
                <td><input id="remarks" name="remarks" type="text" value="{{ old('remarks') }}"></td>
            </tr>
        </tbody>
    </table>

<button type="submit">行程を追加する</button></br>
</form>

<div>
    @foreach($plans as $plan)
    <p>{{$plan->plan_date}}</p>
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
                <tr class="PlanCreate">
                    <td><input id="fromtime" name="from_time" type="time" value="{{$plan->from_time }}"></td>
                    <td><input id="endtime" name="end_time" type="time" value="{{$plan->end_time}}"></td>
                    <td><input id="plan" name="[plan" type="text" value="{{ $plan->plan}}"></td>
                    <td><input id="remarks" name="remarks" type="text" value="{{$plan->remarks}}"></td>
                    <td><a href="/user/plan/{{$plan->id}}/edit">編集</a></td>
                    <td><a href="{{route('plan.delete',['travel_id' => $travel_id])}}">削除</a></td>
                </tr>
            </tbody>
            </table>
    @endforeach
</div>







@endsection


 
