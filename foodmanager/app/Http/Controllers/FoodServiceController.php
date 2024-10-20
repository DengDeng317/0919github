<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodServiceController extends Controller
{
    public function getFoodCategory()
    {
        return FoodCategory::get();
    }
}
