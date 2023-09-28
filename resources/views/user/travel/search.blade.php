{{-- layouts/menu.blade.phpを読み込む --}}
@extends('layouts.menu')

{{-- menu.blade.phpの@yield('title')に埋め込む --}}
@section('title', '観光地検索')

{{-- menu.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<!--観光地などキーワードを入れてGoogle Map API Find Placeを使って検索する-->
<div class = "mapSearch">
    <input type=text id="placeSearchInput" placeholder="お台場">
    <button id="searchButton">検索</button>
    <div style="color: #ffffff;">キーワードを入れてマップ検索できます</div>
</div>
<!--Map及び取得データの表示-->
<div class = "findPlace">
    <div id="placeInfo"></div>
    <div id="map"></div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9g-sWFwUCDm4xXcBnQU-G2b7qDlObDrY&callback=initMap&libraries=places&v=weekly" defer></script>
<script src="{{ secure_asset('js/place.js') }}" charset="UTF-8"></script> 
          

@endsection

