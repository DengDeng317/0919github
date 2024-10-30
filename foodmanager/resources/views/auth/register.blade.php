<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - 註冊頁面</title>
    <!-- 引入 Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- 引入自訂的 CSS -->
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>

<div class="page-container" id="registerContainer">
    <!-- 左上角書頁翻轉效果按鈕 -->
    <div class="page-corner-left">
        <a href="{{ route('login') }}">登入</a>
    </div>

    <h1>註冊</h1>
    <form id="registerForm" action="{{ route('register') }}" method="post">
        @csrf

        @if(session()->get('fail'))
            <p style="color: red;font-size: larger;">{{ session()->get('fail') }}</p>
        @endif
        <label for="username">名稱</label>
        <input type="text" id="username" name="username" placeholder="請輸入名稱" required>

        <!-- Email 作為帳號 -->
        <label for="email">電子郵件</label>
        <input type="email" id="email" name="email" placeholder="請輸入電子郵件" required>

        <!-- 密碼輸入 -->
        <label for="password">密碼</label>
        <div class="password-wrapper">
            <input type="password" id="password" name="password" minlength="8" maxlength="30" placeholder="請輸入密碼" required>
            <!-- 眼睛圖標 -->
            <i class="bi bi-eye-slash password-toggle" id="togglePassword"></i>
        </div>
        <small class="form-text">密碼長度應該在 8 到 30 字元之間，並包含大小寫字母和特殊符號</small>
        <small id="passwordStrength" class="form-text">目前強度: 弱</small>

        <!-- 確認密碼 -->
        <label for="confirmPassword">確認密碼</label>
        <div class="password-wrapper">
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="請再次輸入密碼" required>
            <!-- 眼睛圖標 -->
            <i class="bi bi-eye-slash password-toggle" id="toggleConfirmPassword"></i>
        </div>
        <small id="passwordMatch" class="form-text" style="color:red; display:none;">密碼不一致</small>

        <button type="submit">註冊</button>
    </form>
</div>

<!-- 引入自訂 JavaScript -->
<script src="{{ asset('js/register.js') }}"></script>
</body>
</html>
