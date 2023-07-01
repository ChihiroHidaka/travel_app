{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.app')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '旅行作成')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

<h1>旅行概要を編集する</h1>
<form method="POST" action="{{ route('travel.updated') }}" id="travel_edit">
     @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    @csrf
   
   <label for="travel_title">旅行のタイトル</label>
    <input type="text" name="title" id="travel_title"　value="{{$travel_edit->title}}"></br>
    <label for="start_date">出発日</label>
    <input type="date" name="start_date" id="start_date"　value="{{$travel_edit->start_date}}"></br>
    <label for="start_date">終了日</label>
    <input type="date" name="end_date" id="end_date"　value="{{$travel_edit->end_date}}"></br>
    <label for="description">詳細</label>
    <input type="textarea" name="description" id="description"value="{{($travel_edit->description}}"></br>
    <label for="image">画像</label>
    <input type="file" name="image" id="image"></br>
    
                        

    <button type="submit">旅行を作成する</button></br>
</form>