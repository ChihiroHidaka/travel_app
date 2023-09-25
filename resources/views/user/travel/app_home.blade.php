{{-- layouts/menu.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- menu.blade.phpの@yield('title')に埋め込む --}}
@section('title', 'travel_home')

{{-- menu.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<!--ログイン後の表示画面-->
<h1>こちらはログイン後の表示画面</h1>

@endsection