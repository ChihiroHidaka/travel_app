{{-- layouts/menu.blade.phpを読み込む --}}
@extends('layouts.menu')

{{-- menu.blade.phpの@yield('title')に埋め込む --}}
@section('title', 'setting')

{{-- menu.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<!--ログイン済みのユーザー情報を表示する-->
<h1>ユーザー情報</h1>
<div class = "userInfo">
    <div>・氏名：{{$loginUserData ->name}}</div>
    <div>・メールアドレス：{{$loginUserData ->email}}</div>
    <div>・パスワード：*****</div>
    <p><a href="{{ route('setting.edit',['user_id' => $loginUserData ->id])}}">ユーザー情報を変更する</a></p>
</div>
    
@endsection