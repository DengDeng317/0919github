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
