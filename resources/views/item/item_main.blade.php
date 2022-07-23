<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>商品管理システム</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/2f3cafccdd.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    商品管理システム
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    </div>

    <main class="main">
        <div class="container">
            <div class="row" style='height: 92vh;'>

                <div class="col-md-4 p-0">
                    <div class="card h-100">

                        <div class="card-header d-flex justify-content-between pb-2">
                            <div>商品一覧</div>
                            <div class="justify-content-right">
                                {{-- カテゴリー絞るドロップダウン --}}
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    カテゴリー
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route( 'item_outer' ) }}">アウター</a></li>
                                        <li><a class="dropdown-item" href="{{ route( 'item_tops' ) }}">トップス</a></li>
                                        <li><a class="dropdown-item" href="{{ route( 'item_bottoms' ) }}">ボトムス</a></li>
                                    </ul>
                                </div>
                                {{-- // カテゴリー絞るドロップダウン --}}
                                {{-- 新規登録画面へ遷移ボタン --}}
                                <button class="ms-2" style="font-size:15px; border:none; background:transparent;"><a class='ml-auto text-dark' href='/item_create'><i class="bi bi-patch-plus-fill"></i></a></button>
                                {{-- 新規登録画面へ遷移ボタン --}}
                            </div>
                        </div>
                        {{-- 削除完了メッセージ --}}
                        @if(session('success'))
                            <div class="alert alert-primary" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        {{-- // 削除完了メッセージ --}}

                        {{-- エラーメッセージ --}}
                        @if ($errors->any())
                        <div class="card-text text-left alert alert-danger mb-0">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{-- // エラーメッセージ --}}

                        {{-- 絞り込んだ結果の表示 --}}
                        @foreach($items as $item)
                            <a href="/item_edit/{{ $item['id'] }}" class='d-block text-secondary ms-3'>{{ $item['name'] }}</a>
                        @endforeach
                        {{-- // 絞り込んだ結果の表示 --}}

                    </div>    
                </div>

                <div class="col-md-8 p-0">
                @yield('content')
                </div>

            </div>
        </div>
    </main>
</div>
@yield('fotter')
{{-- bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
