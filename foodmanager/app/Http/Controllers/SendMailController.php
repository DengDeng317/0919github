<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendMailController extends Controller
{
    public function send()
    {
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
                        ->subject('食與惜 - 即將過期的食物');
                });

            }
        }

    }

    public function forgerPassword($email)
    {
        $user = User::where('email', $email)->first();
        if ($user)
        {
            $newPassword = Str::random(16);

            $user->password = bcrypt($newPassword);
            $user->save(); // 保存更改

            Mail::send('send_mail.forget_password', ['password' => $newPassword], function ($message) use ($email) {
                $message->to($email)
                    ->subject('食與惜 - 密碼重置');
            });

            return true;
        } else {
            return false;
        }
    }
}
