{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'planning')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<h1>旅行１</h1>
 <ul>
    <li>日程:</li>
</ul>

 <div class = planning>
    <table class="planning_table">
    <thead>
        <tr>
            <th>時間</th>
            <th>プラン詳細</th>
            <th>補足</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>09:00~11:00</td>
                <td>新幹線で移動</td>
                <td>駅弁で朝ごはん</td>
            </tr>
            <tr>
                <td>12:00~13:00</td>
                <td>大阪到着・通天閣</td>
                <td>昼ごはんは食べ歩き</td>
            </tr>
            <tr>
                <td>14:00~16:00</td>
                <td>大阪城</td>
                <td></td>
            </tr>

@endsection