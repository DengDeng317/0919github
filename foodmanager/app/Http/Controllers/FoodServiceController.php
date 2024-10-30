<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodServiceController extends Controller
{
    public function getFoodCategory()
    {
        $userID = Auth::id();
        return FoodCategory::where('user_id', $userID)->get();
    }
}
