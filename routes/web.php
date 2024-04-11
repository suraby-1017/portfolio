<?php

use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TimelineController;
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

/* ユーザー登録画面 */
Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);
/* ホーム画面 */
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Coffee CRUD
Route::controller(CoffeeController::class)->group(function () {
    // 一覧画面 検索機能
    Route::get('coffee/list', 'index')->name('coffee.index');
    // 登録画面
    Route::get('coffee/create', 'create')->name('coffee.create');
    // 登録処理
    Route::post('coffee/store', 'store')->name('coffee.store');
    // 詳細画面
    // パラメーター{id}を設定
    Route::get('coffee/show/{id}', 'show')->name('coffee.show');
    // 編集画面
    // パラメーター{id}を設定
    Route::get('coffee/edit/{id}', 'edit')->name('coffee.edit');
    // 更新処理
    Route::post('coffee/update/{id}', 'update')->name('coffee.update');
    // 削除処理
    Route::post('coffee/destroy/{id}', 'destroy')->name('coffee.destroy');
});

// 投稿機能 CRUD
Route::controller(TimelineController::class)->group(function () {
    // 一覧表示機能
    Route::get('timeline/list', 'showTimelinePage')->name('timeline.index');
    // 投稿画面
    Route::get('timeline/create', 'create')->name('timeline.create');
    // 投稿機能
    Route::post('timeline/store', 'store')->name('timeline.store');
    // 詳細画面
    Route::get('timeline/show{id}', 'show')->name('timeline.show');
    // 編集画面
    // パラメーター{id}を設定
    Route::get('timeline/edit{id}', 'edit')->name('timeline.edit');
    // 更新処理
    Route::post('timeline/update{id}', 'update')->name('timeline.update');
    // 削除処理
    Route::post('timeline/destroy{id}', 'destroy')->name('timeline.destroy');
});
