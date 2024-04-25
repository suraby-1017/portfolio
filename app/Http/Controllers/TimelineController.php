<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// Lrravel logdebug
use Illuminate\Support\Facades\Log;
// Log::debug($posts);
// Log::messege('Yes'); etc...

class TimelineController extends Controller
{
    public function showTimelinePage()
    {
        $posting = Post::latest()->get();

        return view('timeline', compact('posting'));
    }

    public function create()
    {
        return view('timeline_create');
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => ['required', 'unique:posts'],
                'description' => ['required'],
                'image_path' => ['required', 'image'],
            ],
            [
                'title.required' => 'タイトルは必須です。',
                'description.required' => '内容は必須です。',
                'image_path.required' => '画像は必須です。',
            ]
        );

        $post = new Post();

        $post->user_id = Auth::user()->id;
        $post->title = $request->input('title');
        // Log::debug($request);
        $post->description = $request->input('description');
        // 画像アップロード
        $post->image_path = $request->file('image_path')->store('img', 'public'); //public以外のフォルダに保存したい場合は、storeではなく、storeAsを利用する
        //DBに保存
        $post->save();

        // 投稿一覧ページにリダイレクト
        return redirect('/timeline/list');
    }

    public function show($id)
    {
        $item = Post::find($id);

        return view('timeline_show', compact('item'));
    }

    public function edit($id)
    {
        $item = Post::find($id);

        return view('timeline_edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => ['required'],
                'description' => ['required'],
            ],
            [
                'title.required' => 'タイトルは必須です。',
                'description.required' => '内容は必須です。',
            ]
        );

        try {
            DB::beginTransaction();

            $item = Post::find($id);

            $item->user_id = Auth::user()->id;
            $item->title = $request->input('title');
            // Log::debug($request);
            $item->description = $request->input('description');
            // 画像アップロード
            $item->image_path = $request->file('image_path')->store('img', 'public');
            //DBに保存
            $item->save();

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();
        }

        return redirect('/timeline/list');
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $coffee = Post::find($id);
            $coffee->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect('/timeline/list');
    }
}