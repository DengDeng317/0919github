document.getElementById('mailNotificationSwitch').addEventListener('change', function() {
    if (this.checked) {
        alert('您已開啟 Mail 通知功能。');
    } else {
        alert('您已關閉 Mail 通知功能。');
    }
});

document.getElementById('lineNotificationSwitch').addEventListener('change', function() {
    if (this.checked) {
        alert('您已開啟 LINE 通知功能。');
    } else {
        alert('您已關閉 LINE 通知功能。');
    }
});

document.getElementById('expirationDays').addEventListener('input', function() {
    console.log('即將過期提醒天數修改為：', this.value);
});
