document.getElementById('registerForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (username && email && password) {
        alert('註冊成功！即將返回登入頁面。');

        // 在這裡處理註冊邏輯（例如發送數據到後端）

        // 註冊成功後自動跳轉到登入頁面
        window.location.href = "Login.html";
    } else {
        alert('請確保所有欄位已填寫。');
    }
});
