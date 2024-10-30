document.getElementById('password-reset-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const currentPassword = document.getElementById('current-password').value;
    const newPassword = document.getElementById('new-password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const messageElement = document.getElementById('message');

    // 清空之前的消息
    messageElement.textContent = '';

    // 驗證新密碼是否符合要求（這裡假設至少 8 個字符）
    if (newPassword.length < 8) {
        messageElement.textContent = '新密碼必須至少包含 8 個字符';
        return;
    }

    // 確認新密碼是否一致
    if (newPassword !== confirmPassword) {
        messageElement.textContent = '新密碼和確認密碼不一致';
        return;
    }

    // 可以在這裡進行後端 API 請求來修改密碼
    // 假設請求成功，顯示成功消息
    messageElement.style.color = 'green';
    messageElement.textContent = '密碼已成功修改';
});
