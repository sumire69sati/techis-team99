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
        <!-- ログアウトボタン -->
        <div style="width: 500px; margin: 100px auto;">
            <div style="text-align:right;">
            <button type="button" class="btn btn-secondary btn-sm">ログアウト</button>
            <!-- <a href="/logaut"> >>ログアウト </a> -->
        </div>
        </div>

            <!-- ユーザー一覧 -->
        <div class="col-5 ml-3">
            <table class="table table-bordered table-striped text-center">
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
                        <td>{{$u->updated_at}}</td>
                        <td><a href="/user/edit/{{$u->id}}"> >>編集 </a></td>
                    </tr>
                @endforeach
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