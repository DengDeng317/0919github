<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $userID = Auth::id();
        $getUser = User::find($userID);

        $data = $this->data();
        $data['getUser'] = $getUser;

        return view('notification.index', $data);
    }

    public function store(Request $request)
    {
        $email = ($request->email=='on')?1:0;
        $line = ($request->line=='on')?1:0;
        $days = ($request->days)?:3;

        $userID = Auth::id();
        $getUser = User::find($userID);

        $getUser->email_open = $email;
        $getUser->line_open = $line;
        $getUser->days = $days;
        $getUser->save();

        return back()->with(['message' => '修改成功']);
    }

    public function data()
    {
        return [
            'active' => 'notification',
        ];
    }
}
