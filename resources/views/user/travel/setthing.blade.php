{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'setting')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div>氏名：</div>
<div>メールアドレス：</div>
<div>パスワード：</div>
    

@endsection