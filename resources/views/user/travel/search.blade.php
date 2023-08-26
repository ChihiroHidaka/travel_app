{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '場所検索')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<body>

  <form>
    <input type=text id="place" placeholder="お台場">
    <button type="button" id="place_search" >検索</button>
  </form>
  <hr>
  
  <div id="place_response"></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="{{ secure_asset('js/place.js') }}" charset="UTF-8"></script> 
</body>
@endsection

