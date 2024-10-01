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

document.getElementById('food-form').addEventListener('submit', function (e) {
    e.preventDefault();

    // 收集表單資料
    let foodName = document.getElementById('food-name').value;
    let category = document.getElementById('category').value;
    let storageLocation = document.getElementById('storage-location').value;
    let purchaseDate = document.getElementById('purchase-date').value;
    let quantity = document.getElementById('quantity').value;
    let expiryDate = document.getElementById('expiry-date').value;

    // 保存資料到本地存儲
    let foodItem = {
        foodName: foodName,
        category: category,
        storageLocation: storageLocation,
        purchaseDate: purchaseDate,
        quantity: quantity,
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
