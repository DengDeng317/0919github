<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $rememberMe = ($request->rememberMe) ? true : false;
        $user = User::where('email', $email)->first();
        if (!$user)
            return back()->with('fail', '帳號或密碼錯誤');

        if (Hash::check($password, $user->password))
        {
            $this->loginAuth($user, $rememberMe);
            return redirect()->route('home');
        } else {
            return back()->with('fail', '帳號或密碼錯誤');
        }

    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $email = $request->email;
        $username = $request->username;
        $password = $request->password;
        $confirmPassword = $request->confirmPassword;
        if ($password != $confirmPassword)
            return back()->with('fail', '密碼驗證錯誤');
        $user = User::where('email', $email)->first();
        if ($user)
            return back()->with('fail', '帳號已被註冊');

        $user2 = new User();
        $user2->email = $email;
        $user2->username = $username;
        $user2->password = bcrypt($password);
        $user2->save();
        $addCategory = new AddUserFoodCategoryController();
        $addCategory->addFoodCategory($user2->id);
        $this->loginAuth($user2, true);
        return redirect()->route('home');

    }

    public function loginAuth($user, $rememberMe)
    {
        Auth::login($user, $rememberMe);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
