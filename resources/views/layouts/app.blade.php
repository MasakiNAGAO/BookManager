<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/7ce6cb4385.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @component('components.header')
        @endcomponent
        <main>
        @guest
            @if(Request::is('/'))
                <h1><i class="fa-solid fa-book-open"></i>　Book Managerへようこそ！</h1>
                <br>
                <div id="top_image"><img src="/img/top.jpg" width="800px"></div>
                <p class="child explain">本アプリではあなたの気になる本や読み終えた本などを一括してリスト管理することができます。<br>
                あなただけの本棚を作成して、自分の読書記録を見返したり、仲間たちと共有したりしましょう！</p>
                <div class="center">
                  <a href="{{ route('register') }}"><button class="btn btn-outline-primary" type="button">新規登録</button></a>
                  <a href="{{ route('login') }}"><button class="btn btn-outline-primary" type="button">ログイン</button></a>
                </div>
                <br>
                <h1><i class="fa-solid fa-star"></i>　アプリの概要</h1>
                <div class="center">
                  <a href="{{ route('register') }}"><button class="btn btn-outline-primary" type="button">新規登録</button></a>
                  <a href="{{ route('login') }}"><button class="btn btn-outline-primary" type="button">ログイン</button></a>
                </div>
                <br>
            @else
                @yield('content')
            @endif
        @else
            @yield('content')
        @endguest
        </main>
        @component('components.footer')
        @endcomponent
    </div>
</body>
</html>