<?php

namespace App\Console\Commands;

use App\Models\Food;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendLine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-line';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '發送Line快過期食物';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $getUser = User::where('line_open', 1)->where('line_id', '!=', null)->get();

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

            $text = '';
            foreach ($food as $item2) {
                $text .= '食物名稱:' . $item2->name . "，過期時間:" . $item2->expiration_date . '\n';
            }

            if ($food->count() > 0) {

                $accessToken = env('LINE_TOKEN'); // 請替換為您的 Channel Access Token

// 接收者的 User ID
                $userId = $item->line_id; // 請替換為接收者的有效 User ID

// 消息內容
                $message = [
                    'type' => 'text',
                    'text' => $text
                ];

// 封裝要發送的資料
                $data = [
                    'to' => $userId,
                    'messages' => [$message]
                ];

                $post = json_encode($data);
                $url = 'https://api.line.me/v2/bot/message/push';

                $headers = [
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $accessToken
                ];

// 使用 cURL 發送請求
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $result = curl_exec($ch);
                curl_close($ch);
            }
        }
    }
}
