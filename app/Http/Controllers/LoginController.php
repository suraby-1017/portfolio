<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 認証成功時の処理
            // session fixation 対策として　セッションを再生成
            $request->session()->regenerate();
            return redirect()->intended(route('profile.show'));
        }

        // 認証失敗時の処理
        return redirect()->back()->withErrors(['login' => 'Authentication failed']);
    }

    /* ログアウト機能 */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
