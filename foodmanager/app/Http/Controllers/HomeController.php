<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $foodService;

    public function __construct(FoodServiceController $foodService)
    {
        $this->foodService = $foodService;
    }

    public function index()
    {
        $user_id = Auth::id();
        $getFoodCategory = $this->foodService->getFoodCategory();

        $today = Carbon::today(); // 或者使用 Carbon::now() 取得現在的時間
        $lastFood = Food::where('user_id', $user_id)
            ->where('status' , '!=', '完成')
            ->where('expiration_date', '>=', $today)
            ->orderBy('expiration_date', 'asc')
            ->limit(5)
            ->get();
        $allFood = Food::where('user_id', $user_id)
            ->where('status' , '!=', '完成')
            ->orderBy('expiration_date', 'asc')
            ->get()
            ->groupBy(function ($date) {
                return \Carbon\Carbon::parse($date->expiration_date)->format('Y-m-d');
            });

        $data = $this->data();
        $data['getFoodCategory'] = $getFoodCategory;
        $data['lastFood'] = $lastFood;
        $data['allFood'] = $allFood;

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
