<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
// Lrravel logdebug
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    public function index()
    {
        // itemsテーブルのデータを全て取得
        $items = Coffee::get();
        return view('index', compact('items'));
    }

    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        // 画像フォームでリクエストした画像情報を取得
        $img = $request->file('image');
        // storage > public > img配下に画像が保存される
        $path = $img->store('img', 'public');
        // DBに登録する処理
        Coffee::create([
            'image' => $path,
        ]);
        //　リダイレクト
        return redirect()->route('item.index');
    }
}
