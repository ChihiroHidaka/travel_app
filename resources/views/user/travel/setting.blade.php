{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'setting')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<h1 style ="color:#ffffff;font-size:30px;">ユーザー情報</h1>
<div class = "userInfo">
    <div>氏名：{{$user->name}}</div>
    <div>メールアドレス：{{$user->email}}</div>
    <div>パスワード：*****</div>
    <p><a href="{{ route('setting.edit',['user_id' => $user->id])}}">設定を変更する</a></p>
</div>
    

@endsection