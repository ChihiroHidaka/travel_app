<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="{{ secure_asset('css/home.css') }}" rel="stylesheet">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    </head>

    <body>
        <header id = "trip">
            <h1 class = "page-title">-My Trip-</h1>
            <h2>さあ旅の準備をしよう</h2>
         
        </header>
           
        <main class="display">
            <nav class="main_menu">
                <h1>メニュー</h1>
                <a href="{{ route('travel.create') }}" id="create_travel">➕旅行を追加する</a>
                <!--<h2>旅行一覧</h2>-->
                <ul>
                   @foreach($travelList as $travel)
                    <li><a href="/user/travel/{{$travel->id}}">{{ $travel->title }}</a></li>
                    @endforeach
                </ul>
                <p><a href="{{ route('belongings.create')}}">持ち物チェック</a></p>
                <p><a href="{{ route('weather.create')}}">天気を調べる</a></p>
                <p><a href="{{ route('search.create')}}">観光地を調べる</a></p>
                <p><a href="{{ route('setting.show')}}">設定</a></p>
                <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">ログアウト</button>
                </form>
            </nav>
                     　 
            <section class="contents @if(url()->current() !== url('/user/travel/weather')) section-image @endif">
                @yield('content')
               
            
            </section>      
        </main>
          
          <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9g-sWFwUCDm4xXcBnQU-G2b7qDlObDrY&callback=initMap&libraries=places&v=weekly" defer></script>-->
          <!--<script src="{{ secure_asset('js/place.js') }}" charset="UTF-8"></script> -->
          
    </body>
</html>
