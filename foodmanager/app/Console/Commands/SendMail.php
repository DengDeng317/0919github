<?php

namespace App\Console\Commands;

use App\Models\Food;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '發送Email快過期食物';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $getUser = User::where('email_open', 1)->get();

        // 今天日期
        $today = now();

        foreach ($getUser as $item) {

            // 取得 days 欄位，假設 days 是從今天算起的天數
            $days = $item->days;

            // 計算日期範圍
            $dateRangeStart = $today;
            $dateRangeEnd = $today->copy()->addDays($days);

            // 假設 Food 模型有 date 欄位來記錄食物的日期，根據範圍篩選食物
            $food = Food::where('status', '!=', '已完成')->whereBetween('expiration_date', [$dateRangeStart, $dateRangeEnd])->get();

            $data = [];
            foreach ($food as $item2) {
                $data[] = [
                    'name' => $item2->name,
                    'expiration_date' => $item2->expiration_date
                ];
            }

            if ($food->count() > 0) {

                Mail::send('send_mail.food', ['foods' => $data], function ($message) use ($item) {
                    $message->to($item->email)
                        ->subject('食與惜 - 即將過期的食物');
                });

            }
        }

    }
}
