 
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('create') }}">商品登録</a></li>
                    <li class="nav-item"><a class="nav-link" href="">商品編集</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/user') }}">ユーザー一覧</a></li>
                </ul>
            </div>
        </div>
        @endif
    </nav>
</div>