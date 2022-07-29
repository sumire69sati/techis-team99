<!DOCTYPE html>
<html lang="ja">
@extends('home.app')

@include('home.header')

    <!--ユーザー編集-->
            <div class="text-center">ユーザー情報　会員ID:{{$user->id}}</div>
            <form action="/user/update" class="form-horizontal" method="post">
                @csrf
                <div class="container">
                <div class="row">
                <input class="control-label col-xs-2" type="hidden" name="id" value="{{$user->id}}">
                <div class="text-center">
                    <br>氏名 @if($errors->has('name'))<span class="alert alert-danger">{{ $errors->first('name') }}</span>@endif
                    <input class="col-xs-2" type="text" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                <div class="text-center">
                    <br>メールアドレス @if($errors->has('email'))<span class="alert alert-danger">{{ $errors->first('email') }}</span>@endif
                    <input class="col-xs-2" type="text" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group text-center">
                    <br>該当する者はチェック<br>
                    <input class="form-group" type="checkbox" name="admine_id" id="admin" value="1" {{ old('admine_id',($user->admine_id)) == 1 ? "checked" : "" }}>管理者
                </div>
                <br><div class="form-group text-center">
                    <button type="submit" class="btn btn-secondary">更新</button>
                </div>
            </form>
            <form action="/userDelete" method="post">
            @csrf
                <input class="form-control" type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group text-center"><br>
                    <button type="submit" class="btn btn-secondary">削除</a>
                </div>
            </form>
        </div>
    </body>
        <script>
            'use strict';
                    document.getElementById('admin').addEventListener('click',()=>{
                    alert("管理者権限に間違いはないですか？")
                });
            </script>
    </body>
