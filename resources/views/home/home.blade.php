<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <title>商品一覧画面</title>
</head>
<body>          
    <!-- メニュー -->
    <div class="side">
        <div class="side-manu">  
            <h1>商品管理システム</h1>
            <nav>
                <ul>
                    <li><a href="">商品一覧</a></li>
                    <li><a href="">商品登録</a></li>
                    <li><a href="">商品編集</a></li>
                    <li><a href="">ユーザー一覧</a></li>
                </ul>
            </nav>
        </div>
        <div class="side-user">
            <p>ユーザー名</p>
            <form action="" method="post">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        </div>
    </div>

    <!-- 商品一覧・検索 -->
    <div class="main text-center">
        <h2>商品一覧</h2>
        <div class="search-form mb-2">
            <form action="{{ route('home') }}" method="get">
                @csrf
                <input type="text" name="keyword" placeholder="検索キーワード">
                <button type="submit">検索</button>
            </form>
        </div>

        @if(!empty($keyword))
        <p>「{{ $keyword }}」の検索結果</p>
        @endif

        <div class="pagination justify-content-center">
            {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>

        <div class="items-table">
            @if(count($items)>0)
            <table class="table table-bordered m-auto w-75">
                <tr class="table-info">
                    <th>商品コード</th>
                    <th>種別</th>
                    <th>商品名</th>
                    <th></th>
                </tr>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $types[$item->type] }}</td>
                        <td>{{ $item->name }}</td>
                        <td><button type="button" data-bs-toggle="modal" data-bs-target="#item-modal-{{ $item->id }}">詳細</button></td>
                        <!-- モーダル表示内容 -->
                        <div class="modal fade" id="item-modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content w-75 m-auto">
                                    <div class="modal-header">
                                        <h5 class="modal-title">商品詳細</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="w-75 m-auto text-start">
                                            <p class="mb-0">商品コード</p>
                                            <input class="w-100" type="text" value="{{ $item->id }}">
                                            <p class="mb-0 mt-2">種別</p>
                                            <input class="w-100" type="text" value="{{ $types[$item->type] }}">
                                            <p class="mb-0 mt-2">商品名</p>
                                            <input class="w-100" type="text" value="{{ $item->name }}">
                                            <p class="mb-0 mt-2">詳細</p>
                                            <textarea class="w-100" name="" id="" cols="22" rows="3">{{ $item->detail }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-bs-dismiss="modal">閉じる</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </table>
            @else
            <p>一致する商品はありません。</p>
            @endif
        </div>
    </div>
</body>
</html>
