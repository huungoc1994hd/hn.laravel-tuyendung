<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Requests\Backend\LoginFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Action login
     * @param LoginFormRequest $request
     * @return session user
     */
    public function actionLogin(LoginFormRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.home')->withSuccess('Đăng nhập thành công');
        }
    }

    /**
     * Action logout
     * @return session user
     */
    public function actionLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->withSuccess('Đăng xuất thành công');
    }
}
