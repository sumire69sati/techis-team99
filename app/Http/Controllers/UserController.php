<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Migrations\Migration;
//
use App\Models\User;
use Illuminate\Auth\Middleware\RequirePassword;

class UserController extends Controller
{

    //ユーザー情報を取得してユーザー情報一覧に表示する
    public function index(Request $request){

        //Users(Model)テーブルに入っているレコードを全て取得する
        $users = User::all();

        //画面に渡す(.で中のファイルを示す)
        return view('user.index',['users' => $users]);
    }


    //管理者付与画面へ遷移
    public function edit(Request $request){

        // 一覧から指定されたIDと同じIDを取得する、findはidを持ったものを抽出する(idは重ならない)
        $user = User::find($request->id);

        //下記dd($user);は登録された内容が確認できる（phpMyadminのDB上に書かれているもの）（PHPのvar_dump()と同じ感じ）
        // dd($user);

        //画面に渡す
        return view('user.edit',['user' => $user]);
    }

    //編集画面
    public function update(Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,'.$request->id,
        ],
        [
            'name.required' => '名前を入力してください',
            'name.max' => '文字数がオーバーしています',
            'email.required' => 'メールアドレスを入力してください',
            'email.unique' => 'メールアドレスは既に登録されています',
        ]);

        //ユーザー情報を取得して編集・保存する(Model)
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        //管理者権限の変更
        $user->admine_id = $request->admine_id;
        $user->save();

        return redirect('/user');
    }

    //削除ボタン
    public function userDelete(Request $request){

        //ユーザー情報を取得して削除する
        $user = User::find($request->id);
        //削除する
        $user->delete();

        return redirect('/user');

    }


}