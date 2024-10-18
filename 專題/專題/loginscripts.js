// 控制密碼顯示/隱藏功能
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');

    // 密碼顯示/隱藏切換
    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });

   
});

// 記住密碼功能
window.onload = function() {
    const savedEmail = localStorage.getItem('email');
    const savedPassword = localStorage.getItem('password');
    
    if (savedEmail && savedPassword) {
        document.getElementById('email').value = savedEmail;
        document.getElementById('password').value = savedPassword;
        document.getElementById('rememberMe').checked = true;
    }
}

// 當表單提交時，檢查是否選中記住密碼
document.getElementById('loginForm').addEventListener('submit', function(event) {
    const rememberMe = document.getElementById('rememberMe').checked;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    
    if (rememberMe) {
        localStorage.setItem('email', email);
        localStorage.setItem('password', password);
    } else {
        localStorage.removeItem('email');
        localStorage.removeItem('password');
    }
});

 // 替換書腳按鈕跳轉至註冊頁面
 function flipPageToRegister() {
    window.location.href = 'Register.html';
}

document.addEventListener('DOMContentLoaded', function () {
    const sendEmailButton = document.getElementById('sendEmailButton');
    const countdownText = document.getElementById('countdownText');
    const countdownSpan = document.getElementById('countdown');
    let countdownTimer;

    // 處理忘記密碼表單提交
    document.getElementById('forgotPasswordForm').addEventListener('submit', function (event) {
        event.preventDefault(); // 防止表單提交

        const emailInput = document.getElementById('emailInput').value;
        if (emailInput) {
            // 模擬發送郵件的功能
            sendEmail(emailInput);

            // 開始倒數計時
            startCountdown(60); // 設定 60 秒的倒數
        }
    });

    // 發送郵件的函數（可以替換成實際的郵件發送邏輯）
    function sendEmail(email) {
        alert(`已發送重設密碼郵件到：${email}`);
    }

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
