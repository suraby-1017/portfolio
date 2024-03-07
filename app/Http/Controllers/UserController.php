<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        /* Elquentに条件を付けてモデルを取得 　-> 'where'ではなく'query'で見やすく*/
        $user = User::query()->create([
            'name' => $request['name'],
            'email' => $request['email'],
            /* アプリケーション内で使わないためハッシュ化してパスワードを認証 */
            // *パスワード漏洩対策
            'password' => Hash::make($request['password'])
        ]);
        /* 'Auth'関数で現在認証しているユーザーを取得 */
        Auth::login($user);

        return Redirect::route('profile.show');
        /* return redirect()->route('profile'); */
    }


    public function profile()
    {
        return view('profile');
    }
}
