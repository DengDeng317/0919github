<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    public function index()
    {
        $userID = Auth::id();
        $getUser = User::find($userID);

        $data = $this->data();
        $data['getUser'] = $getUser;

        return view('personal.index', $data);
    }

    public function store(Request $request)
    {
        $userID = Auth::id();
        $getUser = User::find($userID);

        if ($getUser) {

            $username = $request->username;
            $getUser->username = $username;

            // 處理圖片上傳
            if ($request->hasFile('image')) {
                // 儲存圖片到 'public/tags' 目錄下，並獲取檔案路徑
                $path = $request->file('image')->store('public/personal');
                // 儲存圖片路徑
                $getUser->img_url = Storage::url($path); // 取得公開 URL
            }

            // 儲存標籤
            $getUser->save();
            return back()->with(['status' => true, 'message' => '修改成功']);
        } else {
            return back()->with(['status' => false, 'message' => '找不到資料']);
        }
    }

    public function data()
    {
        return [
            'active' => 'personal',
        ];
    }
}
