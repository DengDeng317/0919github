<link rel="stylesheet" href="Notification_settings.css">

<div class="notification-settings-container">
    <!-- Mail 通知開關 -->
    <div class="notification-option mail-notification">
        <label for="mailNotificationSwitch">是否接收 Mail 通知</label>
        <label class="switch">
            <input type="checkbox" id="mailNotificationSwitch">
            <span class="slider"></span>
        </label>
        <div class="warning-container">
            <img src="exclamation-icon.png" alt="警告圖示" class="warning-icon">
            <p class="warning-text">如果開啟此功能，可能每天都會收到一封 E-mail</p>
        </div>
    </div>

    <!-- LINE 通知開關 -->
    <div class="notification-option">
        <label for="lineNotificationSwitch">是否接收 LINE 通知</label>
        <label class="switch">
            <input type="checkbox" id="lineNotificationSwitch">
            <span class="slider"></span>
        </label>
    </div>

    <!-- 提醒即將過期的天數 -->
    <div class="notification-option">
        <label for="expirationDays">食物即將過期幾天前提醒：</label>
        <input type="number" id="expirationDays" min="1" value="3">
    </div>
</div>
<script src="Notification_settings.js"></script>