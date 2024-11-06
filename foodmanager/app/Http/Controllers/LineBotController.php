<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LineBotController extends Controller
{
    public function insertLineID()
    {
        echo env('LINE_TOKEN');
        // 獲取 LINE 發送的請求
        $content = file_get_contents('php://input');
        $log_file = 'log.txt'; // 日誌文件

// 將請求內容寫入日誌文件
        file_put_contents($log_file, date('Y-m-d H:i:s') . "\n" . $content . "\n\n", FILE_APPEND);

// 解析請求內容
        $events = json_decode($content, true);

// 確認有事件
        if (!empty($events['events'])) {
            foreach ($events['events'] as $event) {
                // 檢查是否為用戶事件
                if ($event['source']['type'] == 'user') {
                    // 獲取用戶的 User ID
                    $userId = $event['source']['userId'];
                    $userMessage = $event['message']['text'];

                    // 將用戶的 User ID 寫入 user_id.txt 文件
                    file_put_contents('user_id.txt', $userId . " : ".$userMessage."\n", FILE_APPEND);

                    $getUser = User::where('email', $userMessage)->first();
                    if ($getUser)
                    {
                        if ($getUser->line_id)
                        {
                            $message = 'email已被登記';
                        } else {
                            $getUser->line_id = $userId;
                            $getUser->save();
                            $message = '已將MAIL登記';
                        }

                    } else {
                        $message = '輸入email可以綁定';
                    }

                    // 回覆消息
                    $replyToken = $event['replyToken'];
                    // 呼叫回覆消息的函數
                    $this->replyMessage($replyToken, $message);
                }
            }
        }
    }

    public function replyMessage($replyToken, $message)
    {
        $accessToken = env('LINE_TOKEN'); // 將這裡替換為您的 Channel Access Token

        $data = [
            'replyToken' => $replyToken,
            'messages' => [
                [
                    'type' => 'text',
                    'text' => $message
                ]
            ]
        ];

        $post = json_encode($data);
        $url = 'https://api.line.me/v2/bot/message/reply';

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        curl_close($ch);

        // 將回覆結果寫入日誌
        file_put_contents('log.txt', date('Y-m-d H:i:s') . " Reply: $result\n\n", FILE_APPEND);
    }

}
