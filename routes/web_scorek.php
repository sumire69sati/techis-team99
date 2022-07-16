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