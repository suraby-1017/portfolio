<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
// Lrravel logdebug
use Illuminate\Support\Facades\Log;

class CoffeeController extends Controller
{
    public function index(Request $request)
    {
        // $request = new Request();
        // $keyword に入力された値は 'keyword'に保管される　（Requestインスタンスのinputメソッド）
        $keyword = $request->input('keyword');
        // Log::debug($keyword);
        // whereではなくqueryを使って見やすく
        // $query は DBの'Coffee'からデータをとりだす
        $query = Coffee::query();
        // もし $keyword に値が入力されたら
        if (isset($keyword)) {
            // 取り出すデータの検索条件は 'name' or 'base'
            // Log::info('if from enter program');
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('base', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->get();
        // Log::debug($posts);

        return view('coffee', compact('posts', 'keyword'));
    }

    public function create()
    {
        return view('coffee_create');
    }

    public function store(Request $request)
    {
        $coffee = new Coffee();

        $coffee->name = $request->input('name');
        $coffee->base = $request->input('base');
        $coffee->material = $request->input('material');
        $coffee->comment = $request->input('comment');
        $coffee->image = $request->input('image');
        $coffee->sweetness_level = $request->input('sweetness_level');
        $coffee->bitterness_level = $request->input('bitterness_level');
        //DBに保存
        $coffee->save();

        //一覧表示画面にリダイレクト
        return redirect('/coffee/list');
    }

    //アクションの引数にルートから送られてきたパラメータ{id}を設定
    public function show($id)
    {
        //パラメータ$idをアクション内で使用出来る
        // パラメーターを元にfindで該当のデータを再取得
        $coffee = Coffee::find($id);

        return view('show', compact('coffee'));
    }

    public function edit($id)
    {
        $coffee = Coffee::find($id);

        return view('coffee_edit', compact('coffee'));
    }

    public function update(Request $request, $id)
    {
        $coffee = Coffee::find($id);

        $coffee->name = $request->input('name');
        $coffee->base = $request->input('base');
        $coffee->material = $request->input('material');
        $coffee->comment = $request->input('comment');
        $coffee->image = $request->input('image');
        $coffee->sweetness_level = $request->input('sweetness_level');
        $coffee->bitterness_level = $request->input('bitterness_level');
        //DBに保存
        $coffee->save();

        //処理が終わったらcoffee/listにリダイレクト
        return redirect('/coffee/list');
    }

    public function destroy($id)
    {
        $coffee = Coffee::find($id);

        $coffee->delete();

        return redirect('/coffee/list');
    }
}