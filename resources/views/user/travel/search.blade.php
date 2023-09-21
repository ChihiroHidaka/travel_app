{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '場所検索')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class = "mapSearch">
    <input type=text id="placeSearchInput" placeholder="お台場">
    <button id="searchButton">検索</button>
    <div style="color: #ffffff;">行きたい場所をマップ検索できます</div>
</div>

  
<div id="map"></div>
<div id="placeInfo"></div>
  
@endsection

