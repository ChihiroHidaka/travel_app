@extends('layouts.app')



@section('title', '各行程の編集')


@section('content')
<h1>行程表を編集する</h1>

<form method="POST" action="{{ route('plan.update',['travel_id' => $travel_id]) }}" id="planForm">
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
   <input id="day" name="plan_date" type="date" value-"{{$plan->plan_date }}"></input>
   
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
                <td><input id="fromtime" name="from_time" type="time" value="{{$plan->fromtime }}"></td>
                <td><input id="endtime" name="end_time" type="time" value="{{$plan->end_time }}"></td>
                <td><input id="plan" name="plan" type="text" value="{{ $plan->plan }}"></td>
                <td><input id="remarks" name="remarks" type="text" value="{{ $plan->remarks }}"></td>
            </tr>
        </tbody>
    </table>

<button type="submit">行程を更新する</button></br>
</form>






@endsection


