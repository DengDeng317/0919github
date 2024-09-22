<?php

namespace App\Http\Controllers;

use App\Models\MainCate;
use App\Models\SubCate;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class MainCateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return "欄位錯誤";
        } else {
            $user = User::where('id', $request->id)->with(['mainCate'])->first();
            return $user->mainCate;
        }
    }

    public function index_sub(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'main_id' => 'required',
        ]);
        if ($validator->fails()) {
            return "欄位錯誤";
        } else {
            $subcate = SubCate::where('user_id', $request->user_id)
                ->where('main_cate_id', $request->main_id)
                ->with(['MainCate'])
                ->get();
            return $subcate;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return "欄位錯誤";
        } else {
            $user_id = $request->user_id;
            $main_name = $request->name;
            $user = User::where('id', $user_id)->first();

            if ($user) {
                $checkname = SubCate::where('name', $main_name)
                    ->where('user_id', $user_id)
                    ->first();

                if ($checkname) {
                    return "失敗：主分類名稱重複";
                } else {
                    $mainCate = new MainCate();
                    $mainCate->name = $request->name;
                    $mainCate->save();

                    $user->mainCate()->save($mainCate);

                    return "新增主分類成功";
                }
            } else {
                return "失敗：找不到使用者資料";
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
            'main_id' => 'required',
            'main_name' => 'required',
        ]);
        if ($validator->fails()) {
            return "欄位錯誤";
        } else {
            $user_id = $request->id;
            $main_id = $request->main_id;
            $main_name = $request->main_name;

            $maincate = MainCate::where('user_id', $user_id)->where('id', $main_id)->first();
            if ($maincate) {
                $maincate2 = MainCate::where('user_id', $user_id)
                    ->where('id', '!=', $main_id)
                    ->where('name', $main_name)
                    ->first();
                if ($maincate2) {
                    return "名稱重複";
                } else {
                    $maincate->name = $main_name;
                    $maincate->save();
                    return "修改成功";
                }
            } else {
                return "找不到資料";
            }
        }
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
