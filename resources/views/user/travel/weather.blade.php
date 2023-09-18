{{-- layouts/weather.blade.phpを読み込む --}}
@extends('layouts.weather')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'お天気チェック')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<body>
  <div class ="weatherCurrent">
    <form>
      <input type=text id="city_name" placeholder="京都府">
      <button type="button" id="weather_check" >の天気を調べる</button>
    </form>
    <div>  都市名から現在の天気予報を検索できます</div>
  </div>
  
  
  <div class="container">
    <div id="weather_icon"></div>
    <div id="weather_response"></div>
  </div>
  
 
  <div class = "weatherForecast">
    <form>
      <input type=text id="cityName" placeholder="沖縄県">
      <button type="button" id="weather_check_forecast" >の天気を調べる</button>
   </form>
  <div>  都市名から5日間12時間ごとの天気予報を検索できます</div>
  </div>

  
  <div id="weather_response_forecast"></div>
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="{{ secure_asset('js/weather.js') }}" charset="UTF-8"></script> 
</body>
@endsection

