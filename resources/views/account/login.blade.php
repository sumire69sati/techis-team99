@extends('account.layouts')

@section('content')
<body>
<!-- ログイン画面フォーム -->
<div class="container">
@if(session()->has('loginerror'))
    <div class="alert alert-danger text-center">
        <strong>メールアドレスもしくはパスワードが間違っています</strong>
    </div>
@endif
    <div class="login mx-auto" style="max-width:400px">
        <form class="sign-up" action="{{url('login')}}" method="POST">
            {{ csrf_field() }}

            <h1 class="sign-up-title">商品管理システム</h1>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">メールアドレス</label>
                <input type="email" name="email" class="sign-up-input" id="exampleInputEmail1" value="{{ old('email') }}" placeholder="sample@gmail.com" aria-describedby="emailHelp" autofocus>
                <span class="error_message text-danger">{{ $errors->first("email") }}</span>
            </div>
            <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">パスワード</label>
                <input type="password" name="password" class="sign-up-input" id="exampleInputPassword1" placeholder="半角英数字記号を含む8文字以上">
                <span class="error_message text-danger">{{ $errors->first("password") }}</span>
            </div>
            <div class="mb-2 text-center">
                <button type="submit" class="sign-up-button">ログイン</button>
            </div>
        </form>
    </div>

    <div class="login_form text-center">
        <a href="{{ route('member-form') }}" class="link-primary">
        {{ 'アカウント登録画面はこちら' }}
        </a>
    </div>
</div>


@endsection