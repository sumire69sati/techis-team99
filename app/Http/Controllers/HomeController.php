<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //商品一覧を取得し、一覧画面を表示
    public function index(Request $request){
        // ログインチェック：ログインしていなかったらログイン画面へ遷移
        if(!Auth::user()){
            return redirect('/login-form');
        };

        // 種別を配列に格納
        // $types = Item::TYPES;
        $types = [
            1 => 'アウター',
            2 => 'トップス',
            3 => 'ボトム',
        ];

        // 検索キーワード取得
        $keyword = mb_convert_kana($request->keyword, 's');
        $keywords = explode(" ", $keyword);
        $query = Item::query();
        if($keyword){
            foreach($keywords as $value) {
                $query->where(function($query) use ($value, $types) {
                    $query->orwhere('id',  'LIKE', "%{$value}%")
                        ->orWhere('name','LIKE',"%{$value}%")
                        ->orWhere('detail','LIKE',"%{$value}%");
                    $search_types = preg_grep("#$value#", $types);
                    if($search_types){
                        foreach($search_types as $key => $type){
                            $query->orWhere('type','LIKE',"%{$key}%");
                        }
                    }
                });
            }
        }

        // ユーザー名を結合して、商品一覧取得
        $users = User::select('id AS user_id', 'name AS user_name');
        $items = $query->where('status', '1')->orderby('id')
                        ->leftjoinSub($users, 'users', function ($join) {
                            $join->on('items.user_id', '=', 'users.user_id');
                        })->paginate(5);

        // 画面表示
        return view('home.home', [
            'items' => $items,
            'keyword' => $keyword,
            'types' => $types,
        ]);
    }
}
