<?php

use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* ログイン機能のルート */
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});


/* 簡略　ログインしているユーザーのみがprofile画面を見れるように */
Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.show');
});

/* 登録画面 */
Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);
/* ホーム画面 */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// 検索画面
Route::get('/coffee/list', [CoffeeController::class, 'search'])->name('coffee.index');/* 一覧表示 */
// 詳細画面
// パラメーター{id}を設定
Route::get('/edit/{id}', [CoffeeController::class, 'edit']);

// DBに画像データを保存
Route::get('/form', [FormController::class, 'index'])->name('item.index');
Route::get('/create', [FormController::class, 'create'])->name('item.create');
Route::post('/store', [FormController::class, 'store'])->name('item.store');
