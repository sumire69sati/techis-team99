<div class="header m-2">
    <div class="system d-flex justify-content-between m-2">
        <h1>商品管理システム</h1>
        <div class="user">
            <p class="m-0">ユーザー名</p>
            <form action="" method="post">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        </div>
    </div>
    <div class="manu"> 
        <nav>
            <ul class="list-group list-group-horizontal justify-content-center">
                <li class="list-group-item"><a class="text-decoration-none" href="">商品一覧</a></li>
                <li class="list-group-item"><a class="text-decoration-none" href="">商品登録</a></li>
                <li class="list-group-item"><a class="text-decoration-none" href="">商品編集</a></li>
                <li class="list-group-item"><a class="text-decoration-none" href="">ユーザー一覧</a></li>
            </ul>
        </nav>
    </div>
    
</div>