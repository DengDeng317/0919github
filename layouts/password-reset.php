<link rel="stylesheet" href="password-reset.css">
<div class="password-reset-container">
    <h2>修改密碼</h2>
    <form id="password-reset-form">
        <div class="form-group">
            <label for="current-password">目前密碼：</label>
            <input type="password" id="current-password" name="current-password" required>
        </div>
        <div class="form-group">
            <label for="new-password">新密碼：</label>
            <input type="password" id="new-password" name="new-password" required>
        </div>
        <div class="form-group">
            <label for="confirm-password">確認新密碼：</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
        </div>
        <button type="submit">提交</button>
    </form>
    <div id="message"></div>
</div>
<script src="password-reset.js"></script>