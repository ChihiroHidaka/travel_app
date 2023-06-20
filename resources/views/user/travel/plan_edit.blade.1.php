{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '行程表作成')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    
<!--下記からユーザーによるデータ入力-->
<form method="POST" action="{{ route('plan.store') }}" id="travelForm">
    @csrf
<ul class="time-schedule">
  <li>
    <span class="time"><input id="fromtime" name="details[0][from_time]" type="time" value="{{ old('from_time') }}">~</span>
     <span class="time"><input id="endtime" name="details[0][end_time]" type="time" value="{{ old('end_time') }}"></span>
    <div class="sch_box"><p class="sch_title"><input id="plan" name="details[0][plan]" type="text" value="{{ old('plan') }}"></p>
      <p class="sch_tx" id="remarks" name=datails[0][remarks] type="text" value="{{ old('remarks') }}"> </p>
   </div>
  
</ul>
</form>

   

 
@endsection