<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Item;


class ItemController extends Controller
{
    public function item_create()
    {   
        $items = Item::where('status', 1)->orderBy('updated_at', 'DESC')->take(30)->get();
        // dd($items);

        return view('item.item_create', compact('items'));
    }

    public function item_store(Request $request)
    {
        $data = $request->all();
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'integer',
            'detail' => 'max:250',
        ]);
        $item_id = Item::insertGetId([
            'user_id' => 1, 
            'name' => $data['name'],
            'status' => 1,
            'type' =>$data['type'],
            'detail' => $data['detail'],
        ]);
        return redirect()->route('item_create');
    }

    public function item_edit($id)
    {   
        $user = 1;
        $item = Item::where('status', 1)->where('id',$id)->first();
        $items = Item::where('status', 1)->orderBy('updated_at', 'DESC')->take(30)->get();
        return view('item.item_edit', compact('user', 'item', 'items'));
    }

    public function item_update(Request $request, $id) 
    {
        $inputs = $request->all();
        // dd($inputs);
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'integer',
            'detail' => 'max:250',
        ]);
        Item::where('id', $id)->update([
            'user_id' => 1, 
            'name' => $inputs['name'],
            'type' => $inputs['type'],
            'detail' => $inputs['detail']
        ]);
        return redirect()->route('item_create');
    }

    public function item_delete(Request $request, $id) 
    {
        $inputs = $request->all();
        Item::where('id', $id)->update(['status' => 2]);
        return redirect()->route('item_create')->with('success', '削除が完了しました！');
    }

    public function item_outer()
    {   
        $user = 1;
        $item = Item::where('status', 1)->where('user_id',1)->first();
        $items = Item::where('type', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('item.item_edit', compact('user', 'item', 'items'));
    }

    public function item_tops()
    {   
        $user = 1;
        $item = Item::where('status', 1)->where('user_id',1)->first();
        $items = Item::where('type', 2)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('item.item_edit', compact('user', 'item', 'items'));
    }

    public function item_bottoms()
    {   
        $user = 1;
        $item = Item::where('status', 1)->where('user_id',1)->first();
        $items = Item::where('type', 3)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('item.item_edit', compact('user', 'item', 'items'));
    }

    public function item_search(Request $request)
    {
        $id = $request->id;
        $user = 1;
        $item = Item::where('status', 1)->where('id',$id)->first();
        $items = Item::where('status', 1)->orderBy('updated_at', 'DESC')->take(15)->get();
        // dd($item);
        return view('item.item_edit', compact('user', 'item', 'items'));
    }

    // ログイン情報とつなげるまで、以下のように置き換えている。
    // $user = \Auth::user();  は  $user = 1;
    // where('user_id',$user['id'])  は  where('user_id',1)

}


