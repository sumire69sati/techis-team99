<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//仮登録画面
// Route::get('/register', [App\Http\Controllers\UserController::class, 'register']);
// Route::post('/userRegister',[UserController::class,'userRegister']);


//top ユーザー一覧画面
Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);

//edit 管理者権限付与画面への遷移(編集)
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
//4.編集ボタンを押した時のRoute
Route::post('/user/update',[App\Http\Controllers\UserController::class,'update']);

//削除ボタン
Route::get('/userDelete/{id}',[App\Http\Controllers\UserController::class,'userDelete']);
