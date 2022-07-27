<!DOCTYPE html>
<html lang="ja">
@extends('home.app')

@include('home.header')

            <!-- ユーザー一覧 -->
        <div class="row justify-content-center">
            <!-- table-hoverでマウスにカーソルを合わせると色が変わるようにしたが反応無し -->
            <table class="table table-bordered table-hover text-center">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>メールアドレス</th>
                        <th>権限</th>
                        <th>更新日</th>
                    </tr>
                    @foreach($users as $u)
                        <tr>
                            
                            <td>{{$u->id}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>@if($u->admine_id == 1) 管理者 @else - @endif</td>
                            <!-- <td>{{$u->updated_at}}</td> -->
                            <td>{{ $u->updated_at->format('Y/m/d') }}</td>

                            <td><a href="/user/edit/{{$u->id}}"> 編集 </a></td>
                        </tr>
                    @endforeach
                </thead>
            </table>


        <!-- jQuery,Popper.js,Bootstrap JSの順番で読み込む-->
        <!-- jQueryの読み込み -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <!-- Popper.jsの読み込み -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <!-- Bootstrapのjsの読み込み -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>