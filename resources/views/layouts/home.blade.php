<!DOCTYPE html>
<html>
     <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel = "stylesheet" href="public/css/home.css">
    </head>

    <body>
        <header id = "trip">
            <div>
                <h1 class = "page-title">My trip</h1>
                <h2>さあ旅の準備をしよう</h2>
               
            </div>  
        </header>

        <main class="display">
            <nav>
                <ul class="main_menu">
                    <h2>メニュー</h2>
                    <h3>ユーザー名:</h3>
                    <li><a href="#">旅行一覧</a></li>
                       <ul>
                        <li><a href="#">旅行１</a></li>
                        <li><a href="#">行程表</a></li>
                        <li><a href="#">旅行２</a></li>
                        <li><a href="#">行程表</a></li>
                        <li><a href="#">旅行3</a></li>
                        <li><a href="#">行程表</a></li>
                        <li><a href="#">旅行を追加する</a></li>
                       </ul>
                      
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
