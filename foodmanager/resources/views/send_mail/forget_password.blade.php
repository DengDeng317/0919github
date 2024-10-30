<!-- resources/views/emails/food_reminder.blade.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>食與惜 - 忘記密碼</title>
</head>
<body>
<h1>新密碼：{{ $password }}</h1>

<a href="{{ route('login') }}" style="font-size: large;">登入後請盡快更改密碼</a>
</body>
</html>
