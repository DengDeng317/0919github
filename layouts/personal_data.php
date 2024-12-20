<link rel="stylesheet" href="personal_data.css">


<div class="profile-edit-container">
    <h2>個人資料修改</h2>
    <form id="profileForm">
        <div class="image-upload">
            <img id="profileImage" src="default-avatar.png" alt="大頭照">
            <input type="file" id="fileInput" accept="image/*">
            <button type="button" onclick="uploadImage()">上傳大頭照</button>
        </div>
        <div class="name-edit">
            <label for="username">名稱：</label>
            <input type="text" id="username" name="username">
        </div>
        <button type="submit">儲存修改</button>
    </form>
</div>
<script src="personal_data.js"></script>