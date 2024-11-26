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
        $foodCategory = ($request->food_category)?:null;
        $food_name = ($request->food_name)?:null;
        $storage_location = ($request->storage_location)?:null;
        $purchase_date = ($request->purchase_date)?:null;
        $quantity = ($request->quantity)?:null;
        $price = ($request->price)?:null;
        $expiry_date = ($request->expiry_date)?:null;
        $food_status = ($request->food_status)?:'過期';

        $food = new Food();
        $food->name = $food_name;
        $food->quantity = $quantity;
        $food->price = $price;
        $food->storage_location = $storage_location;
        $food->purchase_date = $purchase_date;
        $food->expiration_date = $expiry_date;
        $food->status = $food_status;
        $food->food_category_id = $foodCategory;
        $food->user_id = Auth::id();
        $food->save();
        return back()->with('success', '新增成功');
    }

    public function update(Request $request)
    {
        $foodId = $request->food_id;
        $foodCategory = ($request->food_category)?:null;
        $food_name = ($request->food_name)?:null;
        $storage_location = ($request->storage_location)?:null;
        $purchase_date = ($request->purchase_date)?:null;
        $quantity = ($request->quantity)?:null;
        $price = ($request->price)?:null;
        $expiry_date = ($request->expiry_date)?:null;
        $food_status = ($request->food_status)?:null;

        $food = Food::find($foodId);
        $food->name = $food_name;
        $food->quantity = $quantity;
        $food->price = $price;
        $food->storage_location = $storage_location;
        $food->purchase_date = $purchase_date;
        $food->expiration_date = $expiry_date;
        $food->status = $food_status;
        $food->food_category_id = $foodCategory;
        $food->save();
        return back()->with('success', '修改成功');
    }

    public function data()
    {
        return [
            'active' => 'calendar',
        ];
    }

}
