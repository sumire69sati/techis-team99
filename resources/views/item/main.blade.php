<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item Admin</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- publicに置いたitem_style.cssファイルを呼び出す --}}
    <link rel="stylesheet" href="{{ asset('/item_css/item_style.css') }}" >
</head>

<body>
{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class="logo" src="{{ asset('/item_img/item_admin.png') }}" >
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- リンクつけたい。 --}}
            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link mx-4" href="#">HOME</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link mx-4" href="#">商品一覧</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link mx-4" href="#">新規登録</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link mx-4" href="#">更新・削除</a>
                </li>
            </ul>{{-- // リンク --}}

            {{-- 検索フォーム --}}
            <div class="row">
                <form method="get" action="/search">
                    <div class="form-group d-flex">
                        <div class="col-xs-2">
                            <input type="text" id="id" class="form-control ms-0" placeholder="Item ID">
                        </div>
                        <button type="submit" class="btn btn-brand me-8">検索</button>
                    </div>
                </form>
            </div>{{-- // 検索フォーム --}}

            {{-- TODO:↓↓ ログアウト機能をつける。ログイン名のボタン的なものを押下したら、ドロップダウンで「ログアウト」と表示される機能を付けたい。 --}}
            <div class="ms-4">ログイン名</div>
        </div>
    </div>
</nav>{{-- // NAVBAR --}}

@if(session('success'))
<div class="alert alert-dark mb-0" role="alert">
    {{ session('success') }}
</div>
@endif

{{-- メッセージ「新規登録」「更新・削除」の文字の上に、メッセージが出るように配置したい。 --}}
@if ($errors->any())
<div class="card-text text-left alert alert-danger mb-0">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif{{-- // メッセージ --}}

@yield('content')

{{-- Footer --}}
<footer class="bg-cover">
    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <p class="mb-0">Hashimoto Tuzuki Kihara Yamada Nagasaki</p>
                </div>
                <div class="col-auto">
                    <p class="mb-0">Design By team99</p>
                </div>
            </div>
        </div>
    </div>
</footer>{{-- // Footer --}}

{{-- Bootstrap Bundle with Popper --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>