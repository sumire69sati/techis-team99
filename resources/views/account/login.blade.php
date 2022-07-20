
<!doctype html>
<!-- CSS only -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>

<body>
<!-- ログイン画面フォーム -->
<div class="container">
<h3 class="sistem_name text-center mt-3">商品管理システム</h3>
@if(session()->has('loginerror'))
    <div class="alert alert-danger text-center">
        <strong>メールアドレスもしくはパスワードが間違っています</strong>
    </div>
@endif
    <div class="login mx-auto" style="max-width:400px">
        <form action="{{url('login')}}" method="POST">
            {{ csrf_field() }}

            
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
            <div class="mb-2 text-center">
                <button type="submit" class="btn btn-primary">ログイン</button>
            </div>
        </form>
    </div>

    <div class="login_form text-center">
        <a href="{{ route('member-form') }}" class="link-primary">
        {{ 'アカウント登録画面はこちら' }}
        </a>
    </div>
</div>
</body>
</html>