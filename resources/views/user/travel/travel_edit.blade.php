<!--layouts/menu.blade.phpを読み込む-->
@extends('layouts.menu')
<!--menu.blade.phpの@yield('title')に埋め込む-->
@section('title', '各旅行概要編集')
<!--menu.blade.phpの@yield('content')に以下のタグを埋め込む-->
@section('content')

<h1>旅行概要を編集する</h1>
<form method="POST" action="{{ route('travel.update',['id' =>$travel->id])}}" id="travel_update">
    @csrf
    @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif
    
    <div class = "inputContents">
        <label for="travel_title">旅行のタイトル</label>
        <input type="text" name="title" id="travel_title"　value="{{$travel->title}}"></br>
        <label for="start_date">出発日</label>
        <input type="date" name="start_date" id="start_date"　value="{{$travel->start_date}}"></br>
        <label for="start_date">終了日</label>
        <input type="date" name="end_date" id="end_date"　value="{{$travel->end_date}}"></br>
        <label for="description">メモ</label>
        <input type="textarea" name="description" id="description" value="{{$travel->description}}"></br>
        <a href="{{route('travel.delete',['id' => $travel->id])}}"style="margin-top:10px;">※「{{$travel->title}}」を削除する</a>
    </div>
    <button style = "margin-top:10px;margin-left:40px;" type="submit">旅行概要を更新する</button></br>
</form>

@endsection