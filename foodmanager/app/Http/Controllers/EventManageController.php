<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventManageController extends Controller
{
    protected $foodService;

    public function __construct(FoodServiceController $foodService)
    {
        $this->foodService = $foodService;
    }

    public function index()
    {
        $userID = Auth::id();
        $getFoodCategory = $this->foodService->getFoodCategory();
        $getFood_1 = Food::where('user_id' , $userID)->where('status', '未過期')->get();
        $getFood_2 = Food::where('user_id' , $userID)->where('status', '過期')->get();
        $getFood_3 = Food::where('user_id' , $userID)->where('status', '完成')->get();

        $data = $this->data();
        $data['getFoodCategory'] = $getFoodCategory;
        $data['getFood_1'] = $getFood_1;
        $data['getFood_2'] = $getFood_2;
        $data['getFood_3'] = $getFood_3;

        return view('event_manage.index', $data);
    }

    public function data()
    {
        return [
            'active' => 'event_manager',
        ];
    }
}
