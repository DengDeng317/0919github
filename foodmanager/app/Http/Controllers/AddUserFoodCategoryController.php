<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class AddUserFoodCategoryController extends Controller
{
    public function addFoodCategory($userID)
    {
        $array = [
            ['name' => '餅乾', 'img_url' => '/img/01.png'],
            ['name' => '糖果', 'img_url' => '/img/02.png'],
            ['name' => '牛奶', 'img_url' => '/img/03.png'],
            ['name' => '果醬', 'img_url' => '/img/04.png'],
            ['name' => '罐頭', 'img_url' => '/img/05.png'],
            ['name' => '洋芋片', 'img_url' => '/img/06.png'],
        ];

        foreach ($array as $item) {
            $category = new FoodCategory();
            $category->name = $item['name'];
            $category->img_url = $item['img_url'];
            $category->user_id = $userID;
            $category->save();
        }
    }
}
