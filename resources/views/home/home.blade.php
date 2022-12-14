@extends('home.app')

@section('title','商品一覧画面')

@section('content')
@include('home.header')
<!-- 商品一覧・検索 -->
<div class="main text-center">
    <h2>商品一覧</h2>
    <div class="search-form mb-3 m-auto">
        <form class="input-group" action="{{ route('home') }}" method="get">
            @csrf
            <input class="form-control me-2" type="text" name="keyword" placeholder="検索キーワード">
            <button class="btn btn-sm btn-secondary" type="submit">検索</button>
        </form>
    </div>

    @if($keyword && $keyword !== " ")
    <p>「{{ $keyword }}」の検索結果</p>
    @endif

    <div class="pagination justify-content-center">
        {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>

    <div class="items-table">
        @if(count($items)>0)
        <table class="table table-sm table-bordered m-auto">
            <tr class="table-secondary">
                <th>商品コード</th>
                <th>種別</th>
                <th>商品名</th>
                <th>更新日</th>
                <th></th>
                @if(Auth::user()->admine_id === 1)
                <th></th>
                @endif
            </tr>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $types[$item->type] }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ date("Y/m/d", strtotime($item->updated_at)) }}</td>
                    <td><button  class="btn btn-sm btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#item-modal-{{ $item->id }}">詳細</button></td>
                    @if(Auth::user()->admine_id === 1)
                        <td>
                            <form action="{{ route('item_edit', ['id' => $item['id']]) }}" method="get">
                                @csrf
                                <button class="btn btn-sm btn-outline-danger" type="submit">編集</button>
                            </form>
                        </td>
                    @endif
                    <!-- モーダル表示内容 -->
                    <div class="modal fade" id="item-modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content w-75 m-auto">
                                <div class="modal-header d-flex justify-content-between">
                                    <h3 class="modal-title">商品詳細</h5>
                                    @if($item->user_name)
                                        <p class="m-1">登録者：{{ $item->user_name }}</p>
                                    @else
                                        <p class="m-1">登録者：削除されたユーザー</p>
                                    @endif
                                </div>
                                <div class="modal-body">
                                    <div class="w-75 m-auto text-start">
                                        <p class="mb-0">商品コード</p>
                                        <input class="w-100" type="text" value="{{ $item->id }}">
                                        <p class="mb-0 mt-2">種別</p>
                                        <input class="w-100" type="text" value="{{ $types[$item->type] }}">
                                        <p class="mb-0 mt-2">商品名</p>
                                        <input class="w-100" type="text" value="{{ $item->name }}">
                                        <p class="mb-0 mt-2">詳細</p>
                                        <textarea class="w-100" name="detail" rows="5">{{ $item->detail }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-dismiss="modal">閉じる</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach
        </table>
        @else
        <p>一致する商品はありません。</p>
        @endif
    </div>
</div>
@endsection
