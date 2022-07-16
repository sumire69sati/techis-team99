<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Item;

class ItemController extends Controller
{
    public function create()
    {   
        // TODO:「管理者」がログインしたら、新規登録画面が表示されるようにしたい。
        return view('item.create');
    }

    public function store(Request $request)
    {
        // バリデーションを実施する。
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'integer | between:1,100',
            'detail' => 'max:250',
        ]);

        $message = [
            'name.required' => '商品名を入力してください',
            'type.between' => '種別は1～100の半角数字で入力してください',
            'detail.max' => '詳細は250字以内で入力してください',
        ];

        $user = \Auth::user();
        $data = $request->all();
        $items = Item::insertGetId([
            'user_id' => 1, 
            'name' => $data['name'],
            'status' => 1,
            'type' =>$data['type'],
            'detail' => $data['detail'],
        ]);
        return redirect('item.create')->with('success', '情報の保存が完了しました');
    }

    public function edit()
    {   
        // TODO:「管理者ID」でログインしたら、更新・削除画面が表示されるようにしたい。
        return view('item.edit');
    }

    public function update(Request $request, $id) 
    {
        // バリデーションを実施する。
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'integer | between:1,100',
            'detail' => 'max:250',
        ]);

        $message = [
            'name.required' => '商品名を入力してください',
            'type.between' => '種別は1～100の半角数字で入力してください',
            'detail.max' => '詳細は250字以内で入力してください',
        ];

        $user = \Auth::user();
        $inputs = $request->all();
        // ItemIDを元に上書きする。※ログインユーザーが他人の登録した商品情報も上書き可能とする。
        Item::where('id', $id)->update([
            'user_id' => $inputs['user_id'], 
            'name' => $inputs['name'], 
            'type' => $inputs['type'], 
            'detail' => $inputs['detail']
        ]);
        return redirect('item.edit')->with('success', '情報の保存が完了しました');
    }

    public function delete(Request $request, $id) 
    {
        $user = \Auth::user();
        $inputs = $request->all();
        // 論理削除なのでstatusを１から２に変更したら画面上見えなくなる。
        // 誰が削除したがわかるようにユーザーIDも上書きする。
        Item::where('id', $id)->update(['user_id' => $inputs['user_id'],'status' => 2]);
        // Item::where('id', $id)->delete();
        return redirect('item.edit')->with('success', '情報の削除が完了しました');
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function search(Request $request) 
    {
        // TODO:検索フォームにitemのidを入力して、一致するitemのidがあったら、該当の情報を下のフォームに表示したい。
        // 検索フォームにitemのidが入力されて、「検索ボタン」が押下される。
        // ①該当のitemのidが存在する場合は、下のフォームに該当の商品情報を表示する。
        // ②該当のitemのdが存在しない場合は、「該当の商品がありません」とメッセージを表示する。 
        // $item = Item::where('id',$id)->where('status', 1)->first();
        return redirect('item.edit')->with('success', '情報の保存が完了しました');
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////
}




