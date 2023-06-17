{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '行程表作成')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<!--下記はデータを引っ張って表示させる-->
<h1>作成した旅行を表示させる</h1>
<!--データベースから引っ張ってくる-->
<a href="{{ route('plan.create') }}" >旅行概要を編集する</a>
 　　<label for="travel_title">旅行のタイトル</label>
    <input type="text" name="title" id="travel_title"　value="{{ old('travel_title') }}"></br>
    <label for="start_date">出発日</label>
    <input type="date" name="start_date" id="start_date"　value="{{ old('start_date') }}"></br>
    <label for="start_date">終了日</label>
    <input type="date" name="end_date" id="end_date"　value="{{ old('end_date') }}"></br>
    <label for="description">詳細</label>
    <input type="textarea" name="description" id="description"value="{{ old('description') }}"></br>
    <label for="image">画像</label>
    <input type="file" name="image" id="image"></br>
    

<a href="{{ route('plan.create') }}" >行程表を作成/編集する</a>