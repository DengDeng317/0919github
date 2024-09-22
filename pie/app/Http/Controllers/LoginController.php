<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->username;
        $pwd = $request->pwd;


        $user = User::where('name', $username)->first();
        if ($user && Hash::check($pwd, $user->pwd)) {
            Auth::login($user);
            return '成功登入';
        } else {
            return back()->with('fail', '帳號密碼錯誤');
        }

    }
}
