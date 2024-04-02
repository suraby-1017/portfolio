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
// 一覧画面 検索機能
Route::get('/coffee/list', [CoffeeController::class, 'index'])->name('coffee.index');
// 登録画面
Route::get('coffee/create', [CoffeeController::class, 'create'])->name('coffee.create');
// 登録処理
Route::post('coffee/store', [CoffeeController::class, 'store'])->name('coffee.store');
// 詳細画面
// パラメーター{id}を設定
Route::get('coffee/show/{id}', [CoffeeController::class, 'show'])->name('coffee.show');
// 編集画面
// パラメーター{id}を設定
Route::get('coffee/edit/{id}', [CoffeeController::class, 'edit'])->name('coffee.edit');
// 更新処理
Route::post('coffee/update/{id}', [CoffeeController::class, 'update'])->name('coffee.update');
// 削除処理
Route::post('coffee/destroy/{id}', [CoffeeController::class, 'destroy'])->name('coffee.destroy');
// DBに画像データを保存
Route::get('/form', [FormController::class, 'index'])->name('item.index');
Route::get('/create', [FormController::class, 'create'])->name('item.create');
Route::post('/store', [FormController::class, 'store'])->name('item.store');

// 投稿機能