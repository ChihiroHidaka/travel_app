{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'travel_home')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<!--ログイン後の表示画面-->
<h1>こちらはログイン後の表示画面</h1>

@endsection