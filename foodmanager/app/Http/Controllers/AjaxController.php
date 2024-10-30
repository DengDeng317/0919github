<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getFoodDetails($id)
    {
        $food = Food::find($id);

        if ($food) {
            return response()->json([
                'id' => $food->id,
                'food_name' => $food->name,
                'category' => $food->foodCategory->name,  // 假設類別是關聯模型
                'food_category_r' => $food->foodCategory->id,  // 假設類別是關聯模型
                'category_img_url' => $food->foodCategory->img_url ? asset($food->foodCategory->img_url) : asset('img/01.png'),
                'storage_location' => $food->storage_location,
                'purchase_date' => $food->purchase_date,
                'quantity' => $food->quantity,
                'price' => $food->price,
                'expiration_date' => $food->expiration_date,
                'status' => $food->status
            ]);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function success_food($id)
    {
        $food = Food::find($id);
        $food->status = "完成";
        $food->save();
    }

    public function getForgetPassword(Request $request)
    {
        $email = $request->email;
        $sendMail = new SendMailController();
        $send = $sendMail->forgerPassword($email);
        if ($send)
        {
            return ['message' => '密碼已發送至信箱'];
        } else {
            return  ['message' => '找不到信箱'];
        }
    }
}
