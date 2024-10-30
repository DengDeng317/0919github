// 假資料標籤（包括圖片）


let currentTagIndex = null;
let isNewTag = false; // 判斷是否是新增模式

// 渲染標籤列表
function renderTags() {
    const tagList = document.getElementById('tagList');
    tagList.innerHTML = ''; // 清空列表
    tags.forEach((tag, index) => {
        const tagCard = document.createElement('div');
        tagCard.classList.add('tag-card');

        const imgElement = document.createElement('img');
        imgElement.src = tag.image;

        const tagNameElement = document.createElement('div');
        tagNameElement.textContent = tag.name;

        tagCard.appendChild(imgElement);
        tagCard.appendChild(tagNameElement);

        tagCard.addEventListener('click', () => openEditTagModal(index));
        tagList.appendChild(tagCard);
    });
}

// 打開編輯標籤的 Modal
function openEditTagModal(index) {
    isNewTag = false; // 編輯模式
    currentTagIndex = index;

    const tagIdInput = document.getElementById('tagId');
    const tagNameInput = document.getElementById('tagName');
    const imagePreview = document.getElementById('imagePreview');
    const modalTitle = document.getElementById('editTagModalLabel');
    const deleteButton = document.getElementById('deleteTagButton');

    modalTitle.textContent = '編輯標籤';
    deleteButton.style.display = 'block'; // 顯示刪除按鈕

    // 預填充標籤資料
    tagIdInput.value = tags[index].id;
    tagNameInput.value = tags[index].name;
    imagePreview.src = tags[index].image;
    imagePreview.style.display = 'block';

    $('#editTagModal').modal('show');
}

// 打開新增標籤的 Modal
document.getElementById('addTagButton').addEventListener('click', () => {
    isNewTag = true; // 新增模式
    const tagNameInput = document.getElementById('tagName');
    const imagePreview = document.getElementById('imagePreview');
    const modalTitle = document.getElementById('editTagModalLabel');

    modalTitle.textContent = '新增標籤';

    // 清空表單
    tagNameInput.value = '';
    imagePreview.src = '';
    imagePreview.style.display = 'none';

    $('#addTagModal').modal('show');
});

// 預覽圖片
function previewImage(event) {
    const imagePreview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function () {
        imagePreview.src = reader.result;
        imagePreview.style.display = 'block';
    };
    if (file) {
        reader.readAsDataURL(file);
    }
}

// 初始化渲染標籤
renderTags();
