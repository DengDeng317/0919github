<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    protected $foodService;

    public function __construct(FoodServiceController $foodService)
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
        $foodCategory = $request->food_category;
        $food_name = $request->food_name;
        $storage_location = $request->storage_location;
        $purchase_date = $request->purchase_date;
        $quantity = $request->quantity;
        $price = $request->price;
        $expiry_date = $request->expiry_date;
        $food_status = $request->food_status;

        $food = new Food();
        $food->name = $food_name;
        $food->quantity = $quantity;
        $food->price = $price;
        $food->storage_location = $storage_location;
        $food->purchase_date = $purchase_date;
        $food->expiration_date = $expiry_date;
        $food->status = $food_status;
        $food->label_id = $foodCategory;
        $food->user_id = Auth::id();
        $food->save();
        return back()->with('success', '新增成功');
    }

    public function update(Request $request, $id)
    {

    }

    public function data()
    {
        return [
            'active' => 'calendar',
        ];
    }

}
