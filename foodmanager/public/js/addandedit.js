document.getElementById('increase-quantity').addEventListener('click', function () {
    let quantity = document.getElementById('quantity');
    quantity.value = parseInt(quantity.value) + 1;
});

document.getElementById('decrease-quantity').addEventListener('click', function () {
    let quantity = document.getElementById('quantity');
    if (quantity.value > 1) {
        quantity.value = parseInt(quantity.value) - 1;
    }
});

function updateQuantity(isIncrease) {
    let quantity = document.getElementById('quantity_r');
    let currentValue = parseInt(quantity.value) || 1;  // 預設值為 1

    if (isIncrease) {
        quantity.value = currentValue + 1;
    } else if (currentValue > 1) {
        quantity.value = currentValue - 1;
    }
}

document.getElementById('increase_quantity_r').addEventListener('click', function () {
    updateQuantity(true);
});

document.getElementById('decrease_quantity_r').addEventListener('click', function () {
    updateQuantity(false);
});

document.getElementById('food-form').addEventListener('submit', function (e) {
    // 你可以在這裡進行進一步的處理，例如保存數據或進行 AJAX 提交
    console.log("食物狀態: ", foodStatus);
});

// 監聽有效期限的變化
document.getElementById('expiry-date').addEventListener('input', function () {
    const expiryDate = new Date(this.value);  // 獲取有效期限日期
    const today = new Date();  // 獲取當天日期

    // 將時間部分設置為零，僅比較日期
    expiryDate.setHours(0, 0, 0, 0);
    today.setHours(0, 0, 0, 0);

    const statusDropdown = document.getElementById('food-status'); // 獲取狀態選擇框

    // 檢查是否過期
    if (expiryDate < today) {
        statusDropdown.value = '過期';  // 自動設置狀態為「過期」
        statusDropdown.disabled = true; // 禁用狀態選擇框
    } else {
        statusDropdown.value = '未過期';  // 如果日期大於或等於今天，恢復為「未過期」
        statusDropdown.disabled = false;  // 允許使用者手動更改狀態
    }


    // 其他邏輯，這裡可以將狀態與其他數據保存到資料庫或處理邏輯中
    console.log(`狀態為: ${foodStatus}`);

    // 提交表單，或保存資料的其他邏輯
    // 這裡應該是將食物數據包括狀態保存到資料庫或進行處理的邏輯
});
