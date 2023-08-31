{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '場所検索')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<body>

  <form>
    <input type=text id="placeSerchInput" placeholder="お台場">
    <button id="searchButton">検索</button>
  </form>
  <hr>
  <div id="map" style="width: 100%; height: 400px;"></div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9g-sWFwUCDm4xXcBnQU-G2b7qDlObDrY&libraries=places"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="{{ secure_asset('js/place.js') }}" charset="UTF-8"></script> 
</body>
@endsection

