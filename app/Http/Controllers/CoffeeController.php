<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
use views\edit;
// Lrravel logdebug
use Illuminate\Support\Facades\Log;

class CoffeeController extends Controller
{
    public function search(Request $request)
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

    //アクションの引数にルートから送られてきたパラメータ{id}を設定
    public function edit($id)
    {
        //パラメータ$idをアクション内で使用出来る
        // パラメーターを元にfindで該当のデータを再取得
        $post = Coffee::find($id);
        return view('edit')->with('post', $post);
    }
}
