{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '場所検索')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class = "mapSearch">
    <input type=text id="placeSearchInput" placeholder="お台場">
    <button id="searchButton">検索</button>
    <div style="color: #ffffff;">キーワードを入れてマップ検索できます</div>
</div>

<div class = "findPlace">
    <div id="placeInfo"></div>
    <div id="map"></div>
</div>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9g-sWFwUCDm4xXcBnQU-G2b7qDlObDrY&callback=initMap&libraries=places&v=weekly" defer></script>
  <script src="{{ secure_asset('js/place.js') }}" charset="UTF-8"></script> 
          

  
@endsection

