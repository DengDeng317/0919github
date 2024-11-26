<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - 登入頁面</title>
    <!-- 引入 Bootstrap 4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- 引入 Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- 引入自訂的 CSS -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body style="background-color: #fff8d9; background-image: url('{{ asset('img/backimg2.png') }}');background-repeat: no-repeat;background-position: right bottom;">

<div class="page-container" id="loginContainer">
    <!-- 右上角書頁翻轉效果按鈕 -->
    <div class="page-corner-right">
        <a href="{{ route('register') }}">註冊</a>
    </div>

    <h1>登入</h1>
    <form id="loginForm" action="{{ route('login') }}" method="post">
        @csrf

        @if(session()->get('fail'))
            <p class="text-danger h3">{{ session()->get('fail') }}</p>
        @endif
        <!-- Email 輸入 -->
        <label for="email">電子郵件</label>
        <input type="email" id="email" name="email" placeholder="請輸入電子郵件" required>

        <!-- 密碼輸入 -->
        <label for="password">密碼</label>
        <div class="password-wrapper">
            <input type="password" id="password" name="password" placeholder="請輸入密碼" required>
            <!-- 眼睛圖標 -->
            <i class="bi bi-eye-slash password-toggle" id="togglePassword"></i>
        </div>

        <!-- 記住密碼與忘記密碼連結 -->
        <div class="remember-forgot">
            <div class="remember-me">
                <input type="checkbox" id="rememberMe" name="rememberMe">
                <label for="rememberMe">記住密碼</label>
            </div>
            <div class="forgot-password">
                <a href="#" data-toggle="modal" data-target="#forgotPasswordModal">忘記密碼了嗎？</a>
            </div>
        </div>

        <button type="submit">登入</button>
    </form>
</div>

<!-- 忘記密碼 Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">忘記密碼</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="forgotPasswordForm">
                    <div class="form-group">
                        <label for="emailInput">請輸入您的電子郵件</label>
                        <input type="email" class="form-control" id="emailInput" placeholder="輸入您的電子郵件"
                               required>
                    </div>
                    <div class="form-group">
                        <button type="button" id="sendEmailButton" class="btn btn-primary">發送郵件</button>
                        <p id="countdownText" style="display:none;">請等待 <span id="countdown">60</span> 秒後才能再次發送
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- 引入 Bootstrap 4 JS 和 jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- 引入自訂的 JavaScript -->
<script src="{{ asset('js/login.js') }}"></script>
<script>



    document.addEventListener('DOMContentLoaded', function () {
        const sendEmailButton = document.getElementById('sendEmailButton');
        const countdownText = document.getElementById('countdownText');
        const countdownSpan = document.getElementById('countdown');
        let countdownTimer;

        // Trigger AJAX call on a button click
        $('#sendEmailButton').on('click', function() {

            startCountdown(60); // 設定 60 秒的倒數
            var inputEmailValue = $('#emailInput').val();

            $.ajax({
                url: '{{ route('forget.password') }}',      // URL of the server endpoint
                method: 'POST',                      // Request type: GET, POST, etc.
                data: { email: inputEmailValue }, // Data to send to the server
                success: function(response) {      // Success callback
                    alert(response.message);
                },
                error: function(xhr, status, error) { // Error callback
                    console.error('Error:', error);
                }
            });
        });

        // 開始倒數計時
        function startCountdown(seconds) {
            let remainingTime = seconds;
            countdownText.style.display = 'block'; // 顯示倒數計時提示
            sendEmailButton.disabled = true; // 禁用按鈕

            countdownTimer = setInterval(() => {
                remainingTime--;
                countdownSpan.textContent = remainingTime; // 更新倒計時文字

                if (remainingTime <= 0) {
                    clearInterval(countdownTimer); // 停止倒計時
                    countdownText.style.display = 'none'; // 隱藏倒計時提示
                    sendEmailButton.disabled = false; // 重新啟用按鈕
                }
            }, 1000); // 每秒更新一次
        }
    });



</script>
</body>
</html>
