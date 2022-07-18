<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
    //アカウント登録画面
    public function create(Request $request)
    {
        return view('account.account');
        
    }
    //アカウント登録機能
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:255',
            'email'=>'required|email',
            'password'=>'required|min:4|confirmed',
            ],
            ['name.required'=>'名前を入力して下さい',
            'name.max'=>'名前を短くして下さい',
            'email.required'=>'メールアドレスを入力して下さい',
            'password.required'=>'パスワードを入力して下さい',
            'password.min'=>'パスワードは4文字以上で入力して下さい。',
            'password.confirmed'=>'確認用パスワードと一致していません。',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return view('account.home');
    }
    //ログイン画面
    public function loginform()
    {
        return view('account.login');
    }
    //ログイン機能
    public function login(Request $request){

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:4'
        ]);


        $login_account = $request->only('email', 'password');
        if (Auth::attempt($login_account)) {
            //ログイン成功
            return redirect()->route('home');
            
        }else{
            /**
             * ログイン失敗
             * エラー表示作る
             */
            return redirect()->route('login-form');
        }
    }
    public function home(){
        return view ('account.home');
    }
    /**
     * ログアウト
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('login-form');
    }


}
