{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'plan_home')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<h1>旅行１</h1>
 <ul>
    <li>日程:</li>
    <li>メンバーリスト:</li>
    <li>メンバーを招待:</li>
</ul>
    

@endsection