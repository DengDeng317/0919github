<?php

namespace App\Http\Controllers;

use App\Models\MainCate;
use App\Models\SubCate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return "欄位錯誤";
        } else {
            $subcate = SubCate::where('user_id', $request->user_id)->get();
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
            'main_id' => 'required',
            'sub_name' => 'required',
        ]);
        if ($validator->fails()) {
            return "欄位錯誤";
        } else {
            $user_id = $request->user_id;
            $main_id = $request->main_id;
            $sub_name = $request->sub_name;
            $sub_remark = $request->sub_remark;
            $user = User::where('id', $user_id)->first();
            $main = MainCate::where('id', $main_id)->first();

            if ($user) {
                if ($main) {
                    $checkname = SubCate::where('name', $sub_name)
                        ->where('main_cate_id', $main_id)
                        ->first();
                    if ($checkname) {
                        return "失敗：次分類名稱重複";
                    } else {
                        $subcate = new SubCate();
                        $subcate->name = $sub_name;
                        $subcate->remark = $sub_remark;
                        $subcate->save();

                        $user->subCate()->save($subcate);
                        $main->subCate()->save($subcate);

                        return "新增次分類成功";
                    }
                } else {
                    return "失敗：找不到主分類資料";
                }
            } else {
                return "失敗：找不到使用者資料";
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'main_id' => 'required',
            'sub_id' => 'required',
            'sub_name' => 'required',
        ]);
        if ($validator->fails()) {
            return "欄位錯誤";
        } 
        else {
            $user_id = $request->user_id;
            $main_id = $request->main_id;
            $sub_id = $request->sub_id;
            $sub_name = $request->sub_name;
            $sub_remark = $request->sub_remark;

            $user = User::where('id', $user_id)->first();
            $main = MainCate::where('id', $main_id)->first();

            if($user)
            {
                if($main)
                {
                    $checkname= SubCate::where('user_id',$user_id)
                                        ->where('main_cate_id',$main_id)
                                        ->where('id',"!=",$sub_id)
                                        ->where('name',$sub_name)
                                        ->first();
                    if($checkname)
                    {
                        return "錯誤：次分類名稱重複";
                    }
                    else
                    {
                        $subcate = SubCate::where('id',$sub_id)->first();
                        $subcate->name = $sub_name;
                        $subcate->remark = $sub_remark;
                        $subcate->save();
                        return "修改次分類成功";
                    }
                }
                else
                {
                    return "錯誤：找不到主分類資料";
                }
            }
            else
            {
                return "錯誤：找不到使用者資料";
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
