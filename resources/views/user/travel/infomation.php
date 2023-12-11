{{-- layouts/menu.blade.phpを読み込む --}}
@extends('layouts.menu')

{{-- menu.blade.phpの@yield('title')に埋め込む --}}
@section('title', 'リンク集')

{{-- menu.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

<h1>リンク集</h1>

   

@endsection

