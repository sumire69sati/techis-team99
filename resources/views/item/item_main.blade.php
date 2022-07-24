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
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="https://kit.fontawesome.com/2f3cafccdd.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="manu px-md-0">   
        <nav class="navbar navbar-expand-md bg-light rounded mb-3 border d-box">
            <div class="header d-flex w-100 justify-content-between p-2">
                <h1 class="text-muted">商品管理システム</h1>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <li class="decoration-none"><a  href="{{ route('logout') }}">ログアウト</a></li>
                    </ul>
                </div>
            </div>
            @if(Auth::user()->admine_id === 1)
            <div class="container-fluid">
                <button class="navbar-toggler btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#Navbar" aria-controls="Navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                    メニュー
                </button>
                <div class="collapse navbar-collapse" id="Navbar">
                    <ul class="navbar-nav text-md-center nav-justified w-100">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">商品一覧</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('item_create') }}">商品登録</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}">ユーザー一覧</a></li>
                    </ul>
                </div>
            </div>
            @endif
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

                        {{-- IDが存在しないメッセージ --}}
                        @if(session('mismatch'))
                            <div class="alert alert-info" role="alert">
                                {{ session('mismatch') }}
                            </div>
                        @endif
                        {{-- //IDが存在しないメッセージ --}}

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

