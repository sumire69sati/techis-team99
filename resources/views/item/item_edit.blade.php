@extends('item.item_main')

@section('content')
<div class="row justify-content-center ml-0 mr-0 h-100">
    <div class="card w-100 px-0">

        <div class="card-header d-flex justify-content-between pb-2">商品情報更新
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

                {{-- 削除ボタン --}}
                <div class="mt-1 ms-2 delete">
                <form method="POST" action="/item_delete/{{$item['id']}}" id='delete-form'>
                    @csrf
                    <button class="text-dark" style="font-size:15px; border:none; background:transparent;"><i id='delete-button' class="bi bi-trash3"></i></button>
                </form>
                </div>
                {{-- //削除ボタン --}}
                
            </div>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('item_update', ['id' => $item['id']]) }}">
            @csrf
            {{-- <input type="hidden" name='user_id' value="{{ $user['id'] }}"> --}}

            <div class="form-group">
                <label for="name" class="px-1 mb-0 mt-2">商品名</label>
                <input name="name" type="text" value="{{ $item['name'] }} {{ old('name') }}" class="form-control" id="name">
            </div>

            <div class="form-group">
                <label for="type" class="px-1 mb-0 mt-2">カテゴリー</label>
                <input name="type" type="text" value="{{ $item['type'] }} {{ old('type') }}" class="form-control" id="type">
            </div>

            <div class="form-group">
                <label for="detail" class="px-1 mb-0 mt-2">詳細情報</label>
                <textarea name="detail" class="form-control" value="{{ $item['delail'] }} {{ old('delail') }}" rows="10">{{ $item['detail'] }}</textarea>
            </div>

            <button type="submit" class="btn btn-dark mx-auto d-block mt-5">更新</button>
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
