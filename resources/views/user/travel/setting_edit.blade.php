{{-- layouts/menu.blade.phpを読み込む --}}
@extends('layouts.menu')

{{--menu.blade.phpの@yield('title')に埋め込む --}}
@section('title', 'setting')

{{-- menu.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<form method="POST" action="{{ route('setting.update',['user_id' =>$loginUserData ->id])}}" id="setting_update">
    @csrf
    @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif
    
    <h1>ユーザー情報を変更する</h1>
    <div class = "userInfo">
        <label for="name">・ユーザーネーム</label>
        <input type="text" name="name" id="name"　value="{{old('name',$loginUserData ->name)}}"></br>
        <label for="email">・メールアドレス</label>
        <input type="email" name="email" id="email"　value="{{old('email',$loginUserData ->email)}}"></br>
        <label for="password">・パスワード</label>
        <input type="text" name="password" id="password"　value="{{$loginUserData ->password}}"></br>
    </div>
    <button style = "margin-top:10px;margin-left:40px;"type="submit">変更する</button></br>
</form>
@endsection