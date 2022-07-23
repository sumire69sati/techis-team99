<!doctype html>
<html lang="ja">
    <head>
        <!-- 文字コード・画面表示の設定 -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>ユーザー編集</title>

        <!-- Bootstrap CSSの読み込み -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    </head>
    <body>
        <!-- ログアウトボタン -->
        <div style="width: 500px; margin: 100px auto;">
            <div style="text-align:right;">
            <a href="/logout" class="btn btn-secondary btn-sm">ログアウト</a>
        </div>

        <div>
            <h4 class="text-center">ユーザー情報　会員ID:{{$user->id}}</h4>
            <form action="/user/update" method="post">
                <!-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif  -->
                @csrf
                <input class="form-control" type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group">
                    氏名 @if($errors->has('name'))<span class="alert alert-danger">{{ $errors->first('name') }}</span>@endif
                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                <div class="form-group">
                    メールアドレス @if($errors->has('email'))<span class="alert alert-danger">{{ $errors->first('email') }}</span>@endif
                    <input class="form-control" type="text" name="email" value="{{$user->email}}">
                </div>
                <!-- <div class="form-group">
                    <input class="form-control" type="text" name="tel" value="{{$user->tel}}">
                </div> -->
                <div class="form-group text-center">
                    該当する者はチェック<br>
                    <input class="form-group" type="checkbox" name="admine_id" id="admin" value="1" {{ old('admine_id',($user->admine_id)) == 1 ? "checked" : "" }}>管理者
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-secondary">更新</button>
                </div>
            </form>
            <form action="/userDelete" method="post">
            @csrf
                <input class="form-control" type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-secondary">削除</a>
                </div>
            </form>
            <!-- <div class="form-group">
                    <a href="/userDelete/{{$user->id}}"><button type="button" class="btn btn-secondary">削除</button></a>
                </div> -->

        </div>
    </body>
    <script>
        'use strict';
        document.getElementById('admin').addEventListener('click',()=>{
            alert("管理者権限に間違いはないですか？")
        });
    </script>



    <!-- jQuery,Popper.js,Bootstrap JSの順番で読み込む-->
        <!-- jQueryの読み込み -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <!-- Popper.jsの読み込み -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <!-- Bootstrapのjsの読み込み -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>