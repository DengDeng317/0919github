<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ManagerTagController extends Controller
{

    public function index()
    {
        $userID = Auth::id();
        $getFoodCategory = FoodCategory::where('user_id', $userID)->get();
        $data = $this->data();
        $data['getFoodCategory'] = $getFoodCategory;

        return view('tag.index', $data);
    }

    public function store(Request $request)
    {
        //
    }

    public function add_store(Request $request)
    {
        // 驗證請求
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 可選的圖片驗證
        ]);

        $id = $request->id;
        $name = $request->name;
        $getFoodCategory = FoodCategory::where('user_id', $id)->where('name', $name)->first();
        if ($getFoodCategory)
        {
            return back()->with(['message' => '名稱已存在']);
        } else {
            // 建立新標籤
            $tag = new FoodCategory();
            $tag->name = $request->input('name');
            $tag->user_id = $request->input('id');

            // 處理圖片上傳
            if ($request->hasFile('image')) {
                // 儲存圖片到 'public/tags' 目錄下，並獲取檔案路徑
                $path = $request->file('image')->store('public/tags');
                // 儲存圖片路徑
                $tag->img_url = Storage::url($path); // 取得公開 URL
            }

            // 儲存標籤
            $tag->save();
            return back()->with(['message' => '新增成功']);
        }

    }

    public function update_store(Request $request)
    {
//        return $request;
        // 驗證請求
        $request->validate([
            'id' => 'required|max:255',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 可選的圖片驗證
        ]);

        $id = $request->id;
        $name = $request->name;
        $getFoodCategory = FoodCategory::where('id', $id)->first();
        if ($getFoodCategory)
        {
            $getFoodCategory->name = $name;

            // 處理圖片上傳
            if ($request->hasFile('image')) {
                // 儲存圖片到 'public/tags' 目錄下，並獲取檔案路徑
                $path = $request->file('image')->store('public/tags');
                // 儲存圖片路徑
                $getFoodCategory->img_url = Storage::url($path); // 取得公開 URL
            }

            // 儲存標籤
            $getFoodCategory->save();
            return back()->with(['message' => '修改成功']);
        } else {
            return back()->with(['message' => '找不到資料']);
        }
    }

    public function tag_delete($id)
    {
        $getFoodCategory = FoodCategory::withCount('food')->find($id);
        if ($getFoodCategory) {
            if ($getFoodCategory->food_count > 0) {
                return ['status' => false, 'message' => '有食物無法刪除'];
            } else {
                $getFoodCategory->delete();
                return ['status' => true, 'message' => '刪除成功'];
            }
        } else {
            return ['status' => false, 'message' => '找不到類別'];
        }
    }

    public function data()
    {
        return [
            'active' => 'tag_manager',
        ];
    }
}
