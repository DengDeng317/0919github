<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function send()
    {
//        Mail::raw('這是測試郵件內容', function ($message) {
//            $message->to('applemine92601@gmail.com')
//                ->subject('測試郵件');
//        });

        // 获取当前日期和未来5天的日期
        $now = Carbon::now();
        $expirationLimit = $now->copy()->addDays(5);

        // 获取所有用户及其过期日期在5天内的食物
        $usersWithExpiringFood = User::with(['food' => function ($query) use ($now, $expirationLimit) {
            $query->where('expiration_date', '>=', $now)
                ->where('expiration_date', '<=', $expirationLimit);
        }])->get();

        foreach ($usersWithExpiringFood as $item) {
            $data = [];
            foreach ($item->food as $food) {
                $data[] = [
                    'name' => $food->name,
                    'expiration_date' => $food->expiration_date
                ];
            }

            if ($item->food->count() > 0) {

                Mail::send('send_mail.food', ['foods' => $data], function ($message) use ($item) {
                    $message->to($item->email)
                        ->subject('即將過期的食物');
                });
                
            }
        }

    }
}
