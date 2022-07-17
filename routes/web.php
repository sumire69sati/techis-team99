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

Route::get('/member-form',[App\Http\Controllers\AccountController::class,'create'])->name('member-form');
Route::post('/member',[App\Http\Controllers\AccountController::class,'store'])->name('member');
Route::get('/login-form',[App\Http\Controllers\AccountController::class,'loginform'])->name('login-form');
Route::post('/login',[App\Http\Controllers\AccountController::class,'login'])->name('login');
Route::get('/home',[App\Http\Controllers\AccountController::class,'home'])->name('home');
Route::get('/home-user',[App\Http\Controllers\AccountController::class,'homeuser'])->name('home-user');
Route::get('/logout',[App\Http\Controllers\AccountController::class,'logout'])->name('logout');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/user/show/{id}', [App\Http\Controllers\UserController::class, 'show']);

// createがきたら、新規登録画面を表示する。
Route::get('item.create', [App\Http\Controllers\ItemController::class, 'create'])->name('create');

// storeがきたら「関数store」（入力された情報をDBへ挿入する）へ。
Route::post('store', [App\Http\Controllers\ItemController::class, 'store'])->name('store');

// editがきたら、更新・削除画面を表示する。
Route::get('/item/edit', [App\Http\Controllers\ItemController::class, 'edit']);

// updateがきたら、「関数update」（itemのidを元にしてDBに新しい情報上書きする。バリデーション追加）へ。
Route::post('/item/update/{id}', [App\Http\Controllers\ItemController::class, 'update']);

// deleteがきたら、「関数deleate」へ。
Route::post('/item/delete/{id}', [App\Http\Controllers\ItemController::class, 'delete']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// // searchがきたら「関数search」（itemのidを元に該当の情報を表示する）へ。
// Route::get('item.search', [App\Http\Controllers\ItemController::class, 'search'])->name('search');

