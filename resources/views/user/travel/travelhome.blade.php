{{-- layouts/menu.blade.phpを読み込む --}}
@extends('layouts.menu')

{{-- home.blade.phpの@yield('title')に埋め込む --}}
@section('title', 'ホーム画面')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

@endsection