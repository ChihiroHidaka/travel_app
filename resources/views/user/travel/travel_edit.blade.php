{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.app')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '各旅行概要編集')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

<h1>旅行概要を編集する</h1>
<form method="POST" action="{{ route('travel.update') }}" id="travel_update">
     @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    @csrf

    <label for="travel_title">旅行のタイトル</label>
    <input type="text" name="title" id="travel_title"　value="{{$travel->title}}"></br>
    <label for="start_date">出発日</label>
    <input type="date" name="start_date" id="start_date"　value="{{$travel->start_date}}"></br>
    <label for="start_date">終了日</label>
    <input type="date" name="end_date" id="end_date"　value="{{$travel->end_date}}"></br>
    <label for="description">詳細</label>
    <input type="textarea" name="description" id="description" value="{{$travel->description}}"></br>
    <label for="image">画像</label>
    <input type="file" name="image" id="image"></br>
    
                        

    <button type="submit">旅行概要を更新する</button></br>
</form>
@endsection