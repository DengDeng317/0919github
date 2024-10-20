<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;

class FoodService
{
    public function getFoodCategory()
    {
        return FoodCategory::get();
    }
}
