@extends('account.layouts')
 
@section('content')
<!-- アカウント登録画面フォーム -->
    <div class="container mx-auto"style="width: 400px;">
        <div class="input_form">
            <form class="sign-up" action="{{url('member')}}" method="POST">
                {{ csrf_field() }}

                <h1 class="sign-up-title">会員登録フォーム</h1>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">名前</label>
                    <span class="badge bg-danger">必須</span>
                    <input type="text" name="name" class="sign-up-input" id="exampleInputEmail1" >
                    <span class="error_message text-danger">{{ $errors->first("name") }}</span>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">メールアドレス</label>
                    <span class="badge bg-danger">必須</span>
                    <input type="email" name="email" class="sign-up-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="sample@gmail.com">
                    <span class="error_message text-danger">{{ $errors->first("email") }}</span>
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">パスワード</label>
                    <span class="badge bg-danger">必須</span>
                    <input type="password" name="password" class="sign-up-input" id="exampleInputPassword1" placeholder="半角英数字記号を含む8文字以上">
                    <span class="error_message text-danger">{{ $errors->first("password") }}</span>
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">パスワード(確認)</label>
                    <span class="badge bg-danger">必須</span>
<<<<<<< HEAD
                    <input type="password" name="password_confirmation" class="sign-up-input" id="exampleInputPassword1" placeholder="半角英数字記号を含む8文字以上">
=======
                    <input type="password" name="password_confirmation" class="sign-up-input" id="exampleInputPassword1">

>>>>>>> 5aa2464615f40c75d5a2769cf36b518329907857
                    <span class="error_message text-danger">{{ $errors->first("password") }}</span>
                </div>
                <div class="mb-2">
                    <input name="kiyaku" type="checkbox" value="1" />利用規約に同意する
                    <br>
                    <span class="error_message text-danger">{{ $errors->first("kiyaku") }}</span>
                </div>
                <div class="mb-2 text-center">
                    <button type="submit" class="sign-up-button">アカウント登録</button>
                </div>
            </form>
        </div>
        <div class="login_form text-center">
            <a href="{{ route('login-form') }}" class="link-primary">
            {{ 'ログイン画面はこちら' }}
            </a>
        </div>
    </div>
@endsection
