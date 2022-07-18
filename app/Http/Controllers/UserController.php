<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Migrations\Migration;
//
use App\Models\User;

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
        // dd($user);

        //画面に渡す
        return view('user.edit',['user' => $user]);
    }

    //編集画面
    public function update(Request $request){

        //ユーザー情報を取得して編集・保存する(Model)
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        //管理者権限の変更
        $user->admine_id = $request->admine_id;
        $user->save();

        return redirect('/user');
    }


}