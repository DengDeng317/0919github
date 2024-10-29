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
