<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// Lrravel logdebug
use Illuminate\Support\Facades\Log;
// Log::debug($posts);
// Log::messege('Yes'); etc...

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

        $request->validate(
            [
                'title' => ['required', 'unique:posts'],
                'sweetness_level' => ['required'],
                'bitterness_level' => ['required'],
            ],
            [
                'title.required' => 'タイトルは必須です。',
                'image.required' => '画像は必須です。',
                'sweetness_level.required' => '甘さは必須です。',
                'bitterness_level.required' => '苦さは必須です。',
            ]
        );

        $coffee = new Coffee();

        $coffee->name = $request->input('name');
        $coffee->base = $request->input('base');
        $coffee->material = $request->input('material');
        $coffee->comment = $request->input('comment');
        // 画像アップロード
        $coffee->image = $request->file('image')->store('img', 'public');
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
        // パラメータ$idをアクション内で使用出来る
        // パラメーターを元にfindで該当のデータを再取得
        $coffee = Coffee::find($id);

        return view('coffee_show', compact('coffee'));
    }

    public function edit($id)
    {
        $coffee = Coffee::find($id);

        return view('coffee_edit', compact('coffee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => ['required', 'unique:posts'],
                'sweetness_level' => ['required'],
                'bitterness_level' => ['required'],
            ],
            [
                'title.required' => 'タイトルは必須です。',
                'image.required' => '画像は必須です。',
                'sweetness_level.required' => '甘さは必須です。',
                'bitterness_level.required' => '苦さは必須です。',
            ]
        );

        // トランザクション処理
        try {
            DB::beginTransaction();

            $coffee = Coffee::find($id);

            $coffee->name = $request->input('name');
            $coffee->base = $request->input('base');
            $coffee->material = $request->input('material');
            $coffee->comment = $request->input('comment');
            $coffee->image = $request->file('image')->store('img', 'public');
            $coffee->sweetness_level = $request->input('sweetness_level');
            $coffee->bitterness_level = $request->input('bitterness_level');
            //DBに保存
            $coffee->save();

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();
        }
        //処理が終わったらcoffee/listにリダイレクト
        return redirect('/coffee/list');
    }

    public function destroy($id)
    {
        // トランザクション処理
        try {
            DB::beginTransaction();

            $coffee = Coffee::find($id);
            $coffee->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect('/coffee/list');
    }
}
