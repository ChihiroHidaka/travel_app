{{-- layouts/weather.blade.phpを読み込む --}}
@extends('layouts.menu')

{{-- home.blade.phpの@yield('title')に埋め込む --}}
@section('title', 'お天気チェック')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<body>
  <h1>天気を調べる</h1>
  <!--現在の天気を調べる-->
  <div class ="weatherCurrent">
    <form>
      <input type=text id="city_name" placeholder="京都府">
      <button type="button" id="weather_check" >の天気を調べる</button>
    </form>
    <div>都市名から現在の天気予報を検索できます</div>
    <div>※都度更新してご利用ください</div>
  </div>
  
  <!--取得データの表示-->
  <div class="container">
    <div id="weather_icon"></div>
    <div id="weather_response"></div>
  </div>
  
 <!--５日間の天気を調べる-->
  <div class = "weatherForecast">
    <form>
      <input type=text id="cityName" placeholder="沖縄県">
      <button type="button" id="weather_check_forecast" >の天気を調べる</button>
    </form>
    <div>都市名から5日間6時間ごとの天気予報を検索できます</div>
    <div>※都度更新してご利用ください</div>
  </div>
  <!--取得データの表示-->
  <div class="weekly" ></div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="{{ secure_asset('js/weather.js') }}" charset="UTF-8"></script> 
</body>
@endsection

