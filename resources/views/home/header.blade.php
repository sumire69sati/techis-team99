<div class="header m-2">
    <div class="system d-flex justify-content-between m-2">
        <h1>商品管理システム</h1>
        <div class="user">
            <p class="m-0">{{ Auth::user()->name }}</p>
            <form action="{{ route('logout') }}" method="get">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        </div>
    </div>
    @if(Auth::user()->admine_id === 1)
    <div class="manu"> 
        <nav>
            <ul class="list-group list-group-horizontal justify-content-center">
                <li class="list-group-item"><a class="text-decoration-none" href="{{ route('home') }}">商品一覧</a></li>
                <li class="list-group-item"><a class="text-decoration-none" href="{{ route('create') }}">商品登録</a></li>
                <li class="list-group-item"><a class="text-decoration-none" href="">商品編集</a></li>
                <li class="list-group-item"><a class="text-decoration-none" href="{{ url('/user') }}">ユーザー一覧</a></li>
            </ul>
        </nav>
    </div>
    @endif
</div>