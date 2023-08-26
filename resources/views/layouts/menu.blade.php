<!DOCTYPE html>
<html>
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="{{ secure_asset('css/home.css') }}" rel="stylesheet">
    </head>

    <body>
        <header id = "trip">
            <h1 class = "page-title">~My trip~</h1>
            <h2>さあ旅の準備をしよう</h2>
            <p>ユーザー名:</p>
        </header>
           
        <main class="display">
            <nav class="main_menu">
                <h1>メニュー</h1>
                <h2>旅行一覧</h2>
                <a href="{{ route('travel.create') }}" id="create_travel">➕旅行を追加する</a>
                <ul>
                   @foreach($travelList as $travel)
                    <li><a href="/user/travel/{{$travel->id}}">{{ $travel->title }}</a></li>
                    @endforeach
                </ul>
                <p><a href="{{ route('belongings.create')}}">持ち物チェック</a></p>
                <p><a href="{{ route('weather.create')}}">天気を調べる</a></p>
                <p><a href="{{ route('search.create')}}">観光地を調べる</a></p>
                <p><a href="#">設定</a></p>
                <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">ログアウト</button>
                </form>
            </nav>
                     　 
            <section class="contents">
                @yield('content')
               
            
            </section>      
        </main>
    </body>
</html>
