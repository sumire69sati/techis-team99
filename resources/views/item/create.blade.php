@extends('item.main')

@section('content')
<div id="main" class="bg-cover input_item">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2>新規登録</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 g-3">

                <form method="POST" action="/store">
                    @csrf
                        <div class="form-group">
                            <label for="type" class="px-1 mb-0 mt-2">種別</label>
                            <input name="type" type="text" value="{{ old('type') }}" class="form-control" placeholder="種別を入力">
                        </div>
                        <div class="form-group">
                            <label for="name" class="px-1 mb-0 mt-2">商品名</label>
                            <input name="name" type="text" value="{{ old('name') }}" class="form-control" id="name" placeholder="商品名を入力">
                        </div>
                        <div class="form-group">
                            <label for="detail" class="px-1 mb-0 mt-2">詳細情報</label>
                            <textarea name="detail" type="text" class="form-control" value="{{ old('delail') }}"  rows="10" placeholder="詳細情報を入力"></textarea>
                        </div>
                        <div class="form-group text-center col-md-12">
                            <button type="submit" class="btn btn-brand">新規登録</button>
                        </div>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
