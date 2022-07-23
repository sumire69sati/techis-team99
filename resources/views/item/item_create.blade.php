@extends('item.item_main')

@section('content')
<div class="row justify-content-center ml-0 mr-0 h-100">
    <div class="card w-100 px-0">

        <div class="card-header d-flex justify-content-between pb-2">新規登録
            <div class="d-flex justify-content-right">
                {{-- 検索フォーム --}}
                <div class="input-group">
                    <form class="row g-1" action="/item_search" method="GET">
                        @csrf
                        <div class="col-auto px-0"><input type="text" class="form-control form-control-sm" placeholder="Item ID" name="id"></div>
                        <div class="col-auto ps-0"><button type="submit" class="btn btn-secondary btn-sm">検索</button></div>
                    </form>
                </div>
                {{-- //検索フォーム --}}
            </div>

        </div>
        <div class="card-body">
            <form method="POST" action="/item_store">
            @csrf
            <input type="hidden" name='user_id' value="{{ $user['id'] }}" >
            <div class="form-group">
                <label for="name" class="px-1 mb-0 mt-2">商品名</label>
                <input name="name" type="text" value="{{ old('name') }}" class="form-control" id="name" placeholder="商品名を入力">
            </div>

        {{-- カテゴリーをドロップダウンで選択 --}}
        <div class="form-group mt-3">
            <label for="id">{{ __('カテゴリー選択') }}</label>
            <select class="form-control" id="type" name="type">
                @foreach (Config::get('type.type_name') as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                @endforeach
            </select>
        </div>
        {{-- // カテゴリーをドロップダウンで選択 --}}


            <div class="form-group">
                <label for="detail" class="px-1 mb-0 mt-3">詳細情報</label>
                <textarea name="detail" value="{{ old('delail') }}" class="form-control" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-dark mx-auto d-block mt-5">登録</button>
            </form>
            <div class="d-flex justify-content-center">

                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_ysqrlxjw.json"  background="transparent"  speed="0.5"  style="width: 100px; height: 100px;"  loop  autoplay></lottie-player>

                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_7etagkhd.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>

                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_ysqrlxjw.json"  background="transparent"  speed="0.5"  style="width: 100px; height: 100px;"  loop  autoplay></lottie-player>

            </div>
    
        </div>
    </div>
</div>
        
@endsection
