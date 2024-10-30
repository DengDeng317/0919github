<!-- resources/views/emails/food_reminder.blade.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>食與惜 - 即將過期的食物提醒</title>
</head>
<body>
<h1>即將過期的食物提醒</h1>
<p>以下是您即將過期的食物：</p>
<ul>
    @foreach ($foods as $food)
        <li>{{ $food['name'] }} - 到期日: {{ $food['expiration_date'] }}</li>
    @endforeach
</ul>
</body>
</html>
