{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'お天気チェック')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<body>
  <form>
    <table>
          <thead>
              <tr>
                  <th>緯度</th>
                  <th>経度</th>
              </tr>
          </thead>
          <tbody>
              <tr id="weather_search">
                  <td><input id="lat"  type="text" placeholder="例）44.34"></td>
                  <td><input id="ron" type="text" placeholder="例）10.09"></td>
              </tr>
          </tbody>
    </table>
    </br>
    <button type="button" id="weather_check" >上記の位置の天気を調べる</button>
  </form>
  <hr>
  
  <div id="weather_response">
     <div id="weather.icon"></div>
    <div id="weather.main"></div>
    <div id="weather.description">&nbsp;</div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="{{ secure_asset('js/weather.js') }}" charset="UTF-8"></script> 
</body>
@endsection

