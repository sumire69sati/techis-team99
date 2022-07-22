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
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:4|confirmed',
            'kiyaku' => 'accepted',
            ],
            ['name.required'=>'名前を入力して下さい',
            'name.max'=>'名前を短くして下さい',
            'email.required'=>'メールアドレスを入力して下さい',
            'email.unique'=>'このメールアドレスは既に登録されています',
            'password.required'=>'パスワードを入力して下さい',
            'password.min'=>'パスワードは4文字以上で入力して下さい。',
            'password.confirmed'=>'確認用パスワードと一致していません。',
            'kiyaku.accepted' => '利用規約に同意して下さい',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'admine_id'=> 0,
        ]);
        return redirect()->route('login-form');
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
        ],
        ['email.required'=>'メールアドレスを入力して下さい',
        'password.required'=>'パスワードを入力して下さい',
        'password.min'=>'パスワードは4文字以上で入力して下さい。',
        ]);


        $login_account = $request->only('email', 'password');
        if (Auth::attempt($login_account)) {
            //ログイン成功
            $user = Auth::user();
            if($user->admine_id == 1){
                return redirect()->route('home');
            }else{
                return redirect()->route('home');
            }
        }else{
            /**
             * ログイン失敗
             * エラー表示作る
             */
            session()->flash('loginerror',true);
            return redirect()->route('login-form');
        }
    }
    public function home(){
        return view ('account.home');
    }
    public function homeuser(){
        return view ('account.home-user');
    }

    
    /**
     * ログアウト
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('login-form');
    }


}
