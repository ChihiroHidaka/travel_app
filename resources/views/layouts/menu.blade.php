<!DOCTYPE html>
<html>
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/home.css') }}" rel="stylesheet">
    </head>

    <body>
        <header id = "trip">
            <div>
                <h1 class = "page-title">My trip</h1>
                <h2>さあ旅の準備をしよう</h2>
            </div>
            
            <form action="{{ route('logout') }}" method="POST">
    　　　　　　@csrf
    　　　　　　<button type="submit">ログアウト</button>
　　　　　　</form>
        </header>
           
        <main class="display">
            <nav>
                <ul class="main_menu">
                    <h2>メニュー</h2>
                    <h3>ユーザー名:</h3>
                    <li>旅行一覧</li>
                       <ul>
                        <li><a href="{{ route('travel.create') }}" id="create_travel">➕旅行を追加する</a></li>
                       </ul>
                       @foreach($travelList as $travel)　
                       <p><a href="user/travel/{{$travel->id}}">{{ $travel->title }}</a></p>
                       @endforeach
                      
                    <li><a href="#">持ち物を確認する</a></li>
                    <li><a href="#">天気を確認する</a></li>
                    <li><a href="#">観光地・経路を調べる</a></li>
                    <li><a href="#">設定</a></li>
                </ul> 
            </nav>
                     　 
            <section class="contents">
                @yield('content')
               
                </ul>
            </section>      
        </main>
    </body>
</html>
