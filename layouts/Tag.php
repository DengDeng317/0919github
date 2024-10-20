<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="Tag.css" rel="stylesheet">


<!-- 白色容器包裹整個標籤管理頁面 -->
<div class="container mt-5 white-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>標籤管理</h2>
        <button id="addTagButton" class="btn btn-success">新增標籤</button>
    </div>

    <div id="tagList" class="d-flex flex-wrap">
        <!-- 標籤列表，動態生成 -->
    </div>
</div>

<!-- 編輯/新增標籤的互動視窗（Modal） -->
<div class="modal fade" id="editTagModal" tabindex="-1" role="dialog" aria-labelledby="editTagModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTagModalLabel">標籤編輯</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editTagForm">
                    <div class="form-group">
                        <label for="tagName">標籤名稱</label>
                        <input type="text" id="tagName" class="form-control" placeholder="輸入標籤名稱" required>
                    </div>
                    <div class="form-group">
                        <label for="tagImage">選擇圖片</label>
                        <input type="file" id="tagImage" class="form-control-file" accept="image/*" onchange="previewImage(event)">
                        <img id="imagePreview" src="" class="mt-3" style="display: none; max-width: 100%; height: auto;">
                    </div>
                </form>
            </div>
            <!-- 按鈕區域 -->
            <div class="modal-footer justify-content-between">
                <button type="submit" form="editTagForm" class="btn btn-primary save-btn">保存變更</button>
                <button type="button" id="deleteTagButton" class="btn btn-danger delete-btn" style="display: none;">刪除標籤</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Tag.js"></script>
</div>