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

<p><a href="/user/travel/{{$travel->id}}/plan/create">行程表を作成/編集する</a></p>
<!--下記に行程表を追加すること-->
<div>
    <p>行程表</p>
    　　<table id="travelplan">
        　　<thead>
                <tr>
                    <th>開始時間</th>
                    <th>終了時間</th>
                    <th>目的地もしくは移動手段</th>
                    <th>備考</th>
                </tr>
       　　 </thead>
        　 <tbody>
                <tr class="travel-detail">
                    <td><input id="fromtime" name="details[0][from_time]" type="time" value="{{ old('from_time') }}"></td>
                    <td><input id="endtime" name="details[0][end_time]" type="time" value="{{ old('end_time') }}"></td>
                    <td><input id="plan" name="details[0][plan]" type="text" value="{{ old('plan') }}"></td>
                    <td><input id="remarks" name=datails[0][remarks] type="text" value="{{ old('remarks') }}"></td>
                </tr>
           </tbody>
    　　</table>

</div>
@endsection