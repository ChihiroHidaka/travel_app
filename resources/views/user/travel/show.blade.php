{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '旅行表示')


{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<!--下記はデータを引っ張って表示させる-->

<div>
     <h1>{{$travel->title}}</h1> 
     <ul>
         <li>旅行開始日：{{$travel->start_date}}</li>
         <li>旅行終了日：{{$travel->end_date}}</li>
         <li> 詳細： {{$travel->description}}</li>
         <li><a href="{{ route('travel.create') }}" >旅行概要を編集する</a></li>
     </ul>
</div>

<p><a href="{{ route('plan.create') }}" >行程表を作成/編集する</a></p>
@endsection