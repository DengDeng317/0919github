document.addEventListener('DOMContentLoaded', function () {
    // 增加數量的自定義「+」按鈕
    document.getElementById('increase-quantity').addEventListener('click', function () {
        let quantity = document.getElementById('quantity');
        let currentValue = parseInt(quantity.value);
        // 每次點擊增加 1
        if (!isNaN(currentValue)) {
            quantity.value = currentValue + 1;
        } else {
            quantity.value = 1;  // 如果數字無效，重置為 1
        }
    });

    // 減少數量的自定義「-」按鈕
    document.getElementById('decrease-quantity').addEventListener('click', function () {
        let quantity = document.getElementById('quantity');
        let currentValue = parseInt(quantity.value);
        // 減少數量，確保不低於 1
        if (!isNaN(currentValue) && currentValue > 1) {
            quantity.value = currentValue - 1;
        } else {
            quantity.value = 1;
        }
    });

    // 表單提交事件
    document.getElementById('food-form').addEventListener('submit', function (e) {
        e.preventDefault();

        // 收集表單資料
        let foodName = document.getElementById('food-name').value;
        let category = document.getElementById('category').value;
        let storageLocation = document.getElementById('storage-location').value;
        let purchaseDate = document.getElementById('purchase-date').value;
        let quantity = document.getElementById('quantity').value;  // 從 input 中取出數量
        let price = document.getElementById('price').value;
        let expiryDate = document.getElementById('expiry-date').value;

        // 保存資料到本地存儲
        let foodItem = {
            foodName: foodName,
            category: category,
            storageLocation: storageLocation,
            purchaseDate: purchaseDate,
            quantity: quantity,
            price: price,
            expiryDate: expiryDate
        };

        // 獲取現有的食物清單，或初始化為空陣列
        let foodList = JSON.parse(localStorage.getItem('foodList')) || [];
        foodList.push(foodItem);
        localStorage.setItem('foodList', JSON.stringify(foodList));

        // 顯示成功訊息
        alert('食物項目已成功新增！');
        // 清空表單
        document.getElementById('food-form').reset();

        // 跳轉到新的頁面
        window.location.href = 'Home.html';
    });
});

$(document).ready(function(){
    $('.dropdown-item').on('click', function() {
        var selectedValue = $(this).data('value'); // 取得 data-value 值
        var selectedImg = $(this).data('img'); // 取得 data-img 值

        // 建立一個臨時的 Image 物件來檢查圖片的實際大小
        var img = new Image();
        img.src = selectedImg;

        img.onload = function() {
            var imgWidth = img.width; // 獲取圖片的寬度

            // 如果圖片寬度大於 50px，設定 max-width: 50px
            var imgStyle = (imgWidth > 50) ? 'style="max-width: 50px;"' : '';

            // 更新按鈕內容
            $('#dropdownMenuButton').html('<img src="' + selectedImg + '" alt="' + selectedValue + '" class="dropdown-icon" ' + imgStyle + '> ' + selectedValue);
        };
    });
});
