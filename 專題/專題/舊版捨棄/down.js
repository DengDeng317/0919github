document.addEventListener('DOMContentLoaded', function() {
    const select = document.getElementById('monthSelect');
    const selected = select.querySelector('.select-selected');
    const items = select.querySelector('.select-items');

    selected.addEventListener('click', function(e) {
        e.stopPropagation();
        closeAllSelect(this);
        items.style.display = items.style.display === 'block' ? 'none' : 'block';
        this.classList.toggle('select-arrow-active');
    });

    items.querySelectorAll('div').forEach(function(item) {
        item.addEventListener('click', function(e) {
            const selectedImage = this.querySelector('img').src;
            const selectedText = this.textContent.trim();
            
            // 更新選中的圖片與文字
            selected.innerHTML = `<img src="${selectedImage}" alt="已選擇的圖片">${selectedText}`;
            selected.dataset.value = this.dataset.value;

            // 更新選中的項目樣式
            items.querySelectorAll('div').forEach(div => div.classList.remove('selected-item-active'));
            this.classList.add('selected-item-active');

            // 隱藏選項
            items.style.display = 'none';
            selected.classList.remove('select-arrow-active');
        });
    });

    function closeAllSelect(elmnt) {
        document.querySelectorAll('.select-items').forEach(function(item) {
            if (item.parentElement !== elmnt.parentElement) {
                item.style.display = 'none';
            }
        });
        document.querySelectorAll('.select-selected').forEach(function(item) {
            if (item !== elmnt) {
                item.classList.remove('select-arrow-active');
            }
        });
    }

    document.addEventListener('click', closeAllSelect);
});
