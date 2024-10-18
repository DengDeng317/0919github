// 控制密碼顯示/隱藏功能
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const passwordStrengthText = document.getElementById('passwordStrength');
    const passwordMatchText = document.getElementById('passwordMatch');

    // 密碼顯示/隱藏切換
    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });

    // 確認密碼顯示/隱藏切換
    toggleConfirmPassword.addEventListener('click', function () {
        const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordInput.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });

    // 密碼強度檢測
    passwordInput.addEventListener('input', function () {
        const strength = checkPasswordStrength(passwordInput.value);
        displayPasswordStrength(strength);
    });

    // 密碼匹配檢測
    confirmPasswordInput.addEventListener('input', function () {
        checkPasswordMatch();
    });

    // 表單提交驗證
    document.getElementById('registerForm').addEventListener('submit', function (event) {
        if (!checkPasswordMatch()) {
            event.preventDefault(); // 阻止表單提交
        }
    });

    // 密碼強度檢測函數
    function checkPasswordStrength(password) {
        let strength = 0;
        if (password.length >= 8 && password.length <= 30) strength += 1;
        if (/[a-z]/.test(password)) strength += 1;
        if (/[A-Z]/.test(password)) strength += 1;
        if (/[0-9]/.test(password)) strength += 1;
        if (/[^a-zA-Z0-9]/.test(password)) strength += 1;

        return strength;
    }

    // 顯示密碼強度
    function displayPasswordStrength(strength) {
        switch (strength) {
            case 1:
            case 2:
                passwordStrengthText.textContent = '目前強度: 弱';
                passwordStrengthText.style.color = 'red';
                break;
            case 3:
                passwordStrengthText.textContent = '目前強度: 中';
                passwordStrengthText.style.color = 'orange';
                break;
            case 4:
            case 5:
                passwordStrengthText.textContent = '目前強度: 高';
                passwordStrengthText.style.color = 'green';
                break;
            default:
                passwordStrengthText.textContent = '目前強度: 弱';
                passwordStrengthText.style.color = 'red';
                break;
        }
    }

    // 檢查兩次輸入的密碼是否匹配
    function checkPasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password !== confirmPassword) {
            passwordMatchText.style.display = 'block';
            return false;
        } else {
            passwordMatchText.style.display = 'none';
            return true;
        }
    }
});

// 替換書腳按鈕跳轉至登入頁面
function flipPageToLogin() {
    window.location.href = 'Login.html';
}
