<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入頁面</title>

    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/sb-admin-2.css?v=2') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/loginstyles.css') }}">

</head>

<body>
    <div class="login-container">
        <h1>登入</h1>
        <form id="loginForm" action="{{ route('login') }}" method="POST">
            @csrf

            <!-- 修改錯誤顯示樣式 -->
            @if(session()->has('fail'))
                {{ session()->get('fail') }}
            @endif
            <!-- 修改錯誤顯示樣式 -->

            <label for="username">請輸入帳號:</label>
            <input type="text" id="username" name="username" placeholder="帳號" required>

            <label for="password">請輸入密碼:</label>
            <input type="password" id="password" name="password" placeholder="密碼" required>

            <button type="submit">登入</button>
        </form>

        <!-- 新增註冊帳號連結 -->
        <p class="register-link">
            沒有帳號？<a href="register.html">註冊帳號</a>
        </p>
    </div>


    <script src="{{  asset('assets/js/loginscripts.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>