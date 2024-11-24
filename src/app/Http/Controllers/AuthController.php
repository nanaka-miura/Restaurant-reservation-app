<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $creator = new CreateNewUser();
        $user = $creator->create($request->all());
        $user->sendEmailVerificationNotification();
        event(new Registered($user));

        return redirect('/register')->with('message', '登録が完了しました。認証メールを送信しましたのでご確認ください。');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && !$user->hasVerifiedEmail()) {
                $user->sendEmailVerificationNotification();
                return redirect()->back()->withErrors([
                    'email' => "メール認証が必要です。認証メールを再送しました。"
                ]);
            }

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return redirect()->back()->withErrors([
            'email' => "ログイン情報が登録されていません"
        ]);
    }

    public function adminLogin() {
        return view('admin-login');
    }

    public function shopLogin() {
        return view('shop-login');
    }

    public function adminDoLogin(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();

            if ($admin->admin_status) {
                return redirect('/admin/mypage');
            } else {
                Auth::guard('admin')->logout();
                return redirect('/admin/login')->withErrors(['error' => '管理者権限がありません']);
            }
        }

        return redirect('/admin/login')->withErrors(['error' => 'ログイン情報が正しくありません']);

    }

    public function shopDoLogin(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();

            if ($admin->shop_admin_status) {
                return redirect('/shop/mypage');
            } else {
                Auth::guard('admin')->logout();
                return redirect('/shop/login')->withErrors(['error' => '管理者権限がありません']);
            }
        }

        return redirect('/shop/login')->withErrors(['error' => 'ログイン情報が正しくありません']);
    }
}
