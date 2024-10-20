<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    protected $foodService;

    public function __construct(FoodService $foodService)
    {
        $this->foodService = $foodService;
    }

    public function index()
    {
        $getFoodCategory = $this->foodService->getFoodCategory();

        $data = $this->data();
        $data['getFoodCategory'] = $getFoodCategory;

        return view('calendar.index', $data);
    }

    public function store(Request $request)
    {
        $foodCategory = $request->input('selectdValue');
        $food_name = $request->input('food-name');
        $foodCategory = $request->input('storage-location');
        $foodCategory = $request->input('purchase-date');
        $foodCategory = $request->input('quantity');
        $foodCategory = $request->input('price');
        $foodCategory = $request->input('expiry-date');

        return $request;
    }

    public function data()
    {
        return [
            'active' => 'calendar',
        ];
    }

}
