<?php

namespace App\Http\Controllers;

use App\Models\MainCate;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = User::with(['mainCate'])->get();
        // foreach ($user as $value) {

        //     print_r($value->name."<br>");

        //     foreach ($value->mainCate as $value2) {
        //         print($value2->name."<br>");
        //     }

        // }

        // $user = User::with(['mainCate.subCates.record.user'])->first();

        // $mainCate = new MainCate();
        // $mainCate->name = "泡麵";
        // $mainCate->save();

        // $user->mainCate()->save($mainCate);



        // return $user;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  Create a new resource
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return "欄位錯誤";
        } else {
            $id = $request->id;
            $user = User::where('id', $id)->first();
            if ($user) {
                return $user;
            } else {
                return "找不到資料";
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'mail' => 'required|email',
            'pwd' => 'required',
        ]);
        if ($validator->fails()) {
            return "欄位錯誤";
        } else {
            $id = $request->id;
            $pwd = $request->pwd;
            $name = $request->name;
            $mail = $request->mail;

            $user = User::where('id', $id)->first();
            if ($user) {
                $user2 = User::where('id', '!=', $id)->where('name', $name)->first();
                if ($user2) {
                    return "名稱重複";
                } else {
                    $user->name = $name;
                    $user->email = $mail;
                    $user->pwd = bcrypt($pwd);
                    $user->save();
                    return "修改成功";
                }
            } else {
                return "找不到資料";
            }
        }
        return $request;
    }

    public function register(Request $request)
    {
        if ($this->validator($request)) {
            return "欄位錯誤";
        } else {
            $user_name = $request->user_name;
            $user_pass = $request->user_pass;
            $user_email = $request->user_email;

            $checkUsername = User::where('name', $user_name)->first();
            if ($checkUsername) {
                return "帳號已被註冊";
            } else {
                $user = new User();
                $user->name = $user_name;
                $user->email = $user_email;
                $user->pwd = bcrypt($user_pass);
                $user->save();
                return "註冊成功";
            }
        }
    }

    public function validator($request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'user_pass' => 'required',
            'user_email' => 'required|email',
        ]);

        return $validator->fails();
    }
}
