@extends('layouts.app')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'setting')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')

<form method="POST" action="{{ route('setting.update',['user_id' =>$user->id])}}" id="setting_update">
     @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    @csrf

    <label for="name">ユーザーネーム</label>
    <input type="text" name="name" id="name"　value="{{$user->name}}"></br>
    <label for="email">メールアドレス</label>
    <input type="email" name="email" id="email"　value="{{$user->email}}"></br>
    <label for="password">パスワード</label>
    <input type="text" name="password" id="password"　value="{{$user->password}}"></br>
   
    <button type="submit">設定内容を更新する</button></br>
</form>


@endsection