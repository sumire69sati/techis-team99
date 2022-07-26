<!doctype html>
<html lang="ja">
    <head>
        <!-- 文字コード・画面表示の設定 -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSSの読み込み -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
            <!-- ユーザー一覧 -->
        <div class="row justify-content-center">
            <!-- table-hoverでマウスにカーソルを合わせると色が変わるようにしたが反応無し -->
            <table class="table table-bordered table-hover text-center">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>メールアドレス</th>
                        <th>権限</th>
                        <th>更新日</th>
                    </tr>
                    @foreach($users as $u)
                        <tr>
                            
                            <td>{{$u->id}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>@if($u->admine_id == 1) 管理者 @else - @endif</td>
                            <!-- <td>{{$u->updated_at}}</td> -->
                            <td>{{ $u->updated_at->format('Y/m/d') }}</td>

                            <td><a href="/user/edit/{{$u->id}}"> 編集 </a></td>
                        </tr>
                    @endforeach
                </thead>
            </table>


        <!-- jQuery,Popper.js,Bootstrap JSの順番で読み込む-->
        <!-- jQueryの読み込み -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <!-- Popper.jsの読み込み -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <!-- Bootstrapのjsの読み込み -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>