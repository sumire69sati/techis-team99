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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/member-form',[App\Http\Controllers\AccountController::class,'create'])->name('member-form');
Route::post('/member',[App\Http\Controllers\AccountController::class,'store'])->name('member');
Route::get('/login-form',[App\Http\Controllers\AccountController::class,'loginform'])->name('login-form');
Route::post('/login',[App\Http\Controllers\AccountController::class,'login'])->name('login');
Route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::get('/logout',[App\Http\Controllers\AccountController::class,'logout'])->name('logout');

//top ユーザー一覧画面
Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);

//edit 管理者権限付与画面への遷移(編集)
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
//4.編集ボタンを押した時のRoute
Route::post('/user/update',[App\Http\Controllers\UserController::class,'update']);

//削除ボタン
Route::get('/userDelete/{id}',[App\Http\Controllers\UserController::class,'userDelete']);

////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/item_create', [App\Http\Controllers\ItemController::class, 'item_create'])->name('item_create');
Route::post('/item_store', [App\Http\Controllers\ItemController::class, 'item_store'])->name('item_store');

Route::get('/item_edit/{id}', [App\Http\Controllers\ItemController::class, 'item_edit'])->name('item_edit');
Route::post('/item_update/{id}', [App\Http\Controllers\ItemController::class, 'item_update'])->name('item_update');
Route::post('/item_delete/{id}', [App\Http\Controllers\ItemController::class, 'item_delete'])->name('item_delete');

Route::get('/item_outer', [App\Http\Controllers\ItemController::class, 'item_outer'])->name('item_outer');
Route::get('/item_tops', [App\Http\Controllers\ItemController::class, 'item_tops'])->name('item_tops');
Route::get('/item_bottoms', [App\Http\Controllers\ItemController::class, 'item_bottoms'])->name('item_bottoms');

Route::get('/item_search', [App\Http\Controllers\ItemController::class, 'item_search'])->name('item_search');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////



