<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    public function search(Request $request)
    {   /* 変数が宣言されていること、そして NULL とは異なることを検査する 'isset' */
        if (isset($request->keyword)) {
            /* 'where'で条件検索 */
            $coffee = Coffee::where('name', $request->keyword)
                /* 'orwhere'で'もしくは ' */
                ->orWhere('base', $request->keyword)
                ->get();
        } else {
            $coffee = Coffee::get();
        }

        return view('coffee', [
            'coffee' => $coffee,
            'keyword' => $request->keyword
        ]);
    }
}
