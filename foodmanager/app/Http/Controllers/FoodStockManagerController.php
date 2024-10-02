<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodStockManagerController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $getFoodCategory = FoodCategory::get();
        $data = $this->data();
        $data['getFoodCategory'] = $getFoodCategory;

        return view('food_stock_manager.index',$data);
    }

    public function store(Request $request)
    {
        return $request;
    }

    public function data()
    {
        return [
            'active' => 'food_stock_manager',
        ];
    }
}
