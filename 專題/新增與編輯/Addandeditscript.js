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

    // 此處可以將資料保存到本地存儲或發送到伺服器
    console.log({
        foodName: foodName,
        category: category,
        storageLocation: storageLocation,
        purchaseDate: purchaseDate,
        quantity: quantity,
        expiryDate: expiryDate
    });

    // 清空表單
    document.getElementById('food-form').reset();

    alert('食物項目已成功新增！');
});
