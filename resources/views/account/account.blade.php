
<!doctype html>
<!-- CSS only -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>

<body>
<!-- アカウント登録画面フォーム -->
    
    <h3 class="sistem_name text-center mt-3">商品管理システム</h3>
    <div class="container mx-auto"style="width: 400px;">
        <div class="input_form">
            <form action="{{url('member')}}" method="POST">
                {{ csrf_field() }}

                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">名前</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" >
                    <span class="error_message text-danger">{{ $errors->first("name") }}</span>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">メールアドレス</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="error_message text-danger">{{ $errors->first("email") }}</span>
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">パスワード</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    <span class="error_message text-danger">{{ $errors->first("password") }}</span>
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">パスワード(確認)</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
                    <span class="error_message text-danger">{{ $errors->first("password") }}</span>
                </div>
                <div class="mb-2">
                    <input name="kiyaku" type="checkbox" value="1" />利用規約に同意する
                    <br>
                    <span class="error_message text-danger">{{ $errors->first("kiyaku") }}</span>
                </div>
                <div class="mb-2 text-center">
                    <button type="submit" class="btn btn-primary">アカウント登録</button>
                </div>
            </form>
        </div>
        <div class="login_form text-center">
            <a href="{{ route('login-form') }}" class="link-primary">
            {{ 'ログイン画面はこちら' }}
            </a>
        </div>
    </div>

</body>
</html>