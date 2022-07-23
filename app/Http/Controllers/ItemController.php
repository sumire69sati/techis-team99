<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Item;


class ItemController extends Controller
{
    public function item_create()
    {   
        $user = \Auth::user();
        $items = Item::where('status', 1)->where('user_id', $user['id'])->orderBy('updated_at', 'DESC')->take(30)->get();
        // dd($items);

        return view('item.item_create', compact('user', 'items'));
    }

    public function item_store(Request $request)
    {
        $data = $request->all();
        $user = \Auth::user();
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'integer',
            'detail' => 'max:250',
        ]);
        $item_id = Item::insertGetId([
            'user_id' => $user['id'], 
            'name' => $data['name'],
            'status' => 1,
            'type' =>$data['type'],
            'detail' => $data['detail'],
        ]);
        return redirect()->route('item_create');
    }

    public function item_edit($id)
    {   
        $user = \Auth::user();
        $item = Item::where('status', 1)->where('id',$id)->first();
        $array = array('1'=>'アウター', '2'=>'トップス', '3'=>'ボトムス');
        $items = Item::where('status', 1)->orderBy('updated_at', 'DESC')->take(30)->get();
        return view('item.item_edit', compact('user', 'item', 'array', 'items',));
    }

    public function item_update(Request $request, $id) 
    {
        $inputs = $request->all();
        $user = \Auth::user();
        // dd($inputs);
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'integer',
            'detail' => 'max:250',
        ]);
        Item::where('id', $id)->update([
            'user_id' => $user['id'], 
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
        $user = \Auth::user();
        $item = Item::where('status', 1)->where('user_id', $user['id'])->first();
        $items = Item::where('type', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('item.item_edit', compact('user', 'item', 'items'));
    }

    public function item_tops()
    {   
        $user = \Auth::user();
        $item = Item::where('status', 1)->where('user_id', $user['id'])->first();
        $items = Item::where('type', 2)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('item.item_edit', compact('user', 'item', 'items'));
    }

    public function item_bottoms()
    {   
        $user = \Auth::user();
        $item = Item::where('status', 1)->where('user_id', $user['id'])->first();
        $items = Item::where('type', 3)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        return view('item.item_edit', compact('user', 'item', 'items'));
    }

    public function item_search(Request $request)
    {
        $id = $request->id;
        $user = \Auth::user();
        $array = array('1'=>'アウター', '2'=>'トップス', '3'=>'ボトムス');
        $item = Item::where('status', 1)->where('id',$id)->first();
        $items = Item::where('status', 1)->orderBy('updated_at', 'DESC')->take(15)->get();
        // dd($item);
        return view('item.item_edit', compact('user', 'array','item', 'items'));
    }

    // ログイン情報とつなげるまで、以下のように置き換えている。
    // $user = \Auth::user();  は  $user = 1;
    // where('user_id',$user['id'])  は  where('user_id',1)

}


