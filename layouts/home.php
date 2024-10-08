<link rel="stylesheet" href="Addandeditscript.css"> <!-- 引入外部CSS -->
<div class="folder" id="current-folder">
    <div class="folder-header" onclick="toggleFolder('current')">
        <span class="arrow" id="arrow-current">▼</span>
        <img src="icon_current.png" alt="圖示" class="icon">
        <h2>當前紀錄</h2>
    </div>

    <div id="current" class="content">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <div class="d-flex flex-row mb-3">
                        <a href="Addandedit.html" class="record mr-3">
                            <img src="image1.jpg" alt="圖片">
                            <p>紀錄名稱1</p>
                            <p>有效日期: 2024-12-31</p>
                        </a>
                        <a href="Addandedit.html" class="record mr-3">
                            <img src="image1.jpg" alt="圖片">
                            <p>紀錄名稱1</p>
                            <p>有效日期: 2024-12-31</p>
                        </a>
                        <a href="Addandedit.html" class="record">
                            <img src="image1.jpg" alt="圖片">
                            <p>紀錄名稱1</p>
                            <p>有效日期: 2024-12-31</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 其他記錄事項 -->
    </div>
</div>

<div class="folder" id="waste-folder">
    <div class="folder-header" onclick="toggleFolder('waste')">
        <span class="arrow" id="arrow-waste">▼</span>
        <img src="icon_waste.png" alt="圖示" class="icon">
        <h2>廚餘桶紀錄</h2>
    </div>
    <div id="waste" class="content">
        <a href="Addandedit.html" class="record">
            <img src="image6.jpg" alt="圖片">
            <p>紀錄名稱6</p>
            <p>有效日期: 2024-11-30</p>
        </a>
        <!-- 其他記錄事項 -->
    </div>
</div>

<div class="folder" id="finished-folder">
    <div class="folder-header" onclick="toggleFolder('finished')">
        <span class="arrow" id="arrow-finished">▼</span>
        <img src="icon_finished.png" alt="圖示" class="icon">
        <h2>吃完紀錄</h2>
    </div>
    <div id="finished" class="content">
        <a href="Addandedit.html" class="record">
            <img src="image11.jpg" alt="圖片">
            <p>紀錄名稱11</p>
            <p>有效日期: 2024-10-31</p>
        </a>
        <!-- 其他記錄事項 -->
    </div>
</div>
<div class="folder" id="finished-folder">
    <div class="folder-header" onclick="toggleFolder('finished')">
        <span class="arrow" id="arrow-finished">▼</span>
        <img src="icon_finished.png" alt="圖示" class="icon">
        <h2>吃完紀錄</h2>
    </div>
    <div id="finished" class="content">
        <a href="Addandedit.html" class="record">
            <img src="image11.jpg" alt="圖片">
            <p>紀錄名稱11</p>
            <p>有效日期: 2024-10-31</p>
        </a>
        <!-- 其他記錄事項 -->
    </div>
</div>
<div class="folder" id="finished-folder">
    <div class="folder-header" onclick="toggleFolder('finished')">
        <span class="arrow" id="arrow-finished">▼</span>
        <img src="icon_finished.png" alt="圖示" class="icon">
        <h2>吃完紀錄</h2>
    </div>
    <div id="finished" class="content">
        <a href="Addandedit.html" class="record">
            <img src="image11.jpg" alt="圖片">
            <p>紀錄名稱11</p>
            <p>有效日期: 2024-10-31</p>
        </a>
        <!-- 其他記錄事項 -->
    </div>
</div>
<!-- 浮動按鈕 -->
<div class="fixed-bottom">
    <div class="position-fixed" style="right: 15px; bottom: 80px;">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info btn-lg rounded-circle shadow" id="floatingBtn" data-toggle="modal" data-target=".bd-example-modal-lg">
            <i class="fas fa-plus"></i>
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-utensils mr-2"></i>新增食物</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="food-form">
                        <div class="form-group">
                            <label for="food-name"><i class="fas fa-carrot mr-2"></i>食物名稱:</label>
                            <input type="text" class="form-control border-info" id="food-name" name="food-name" required>
                        </div>
                        <div class="form-group">
                            <label for="category"><i class="fas fa-th-large mr-2"></i>類別:</label>
                            <select id="category" name="category" class="form-control border-info custom-select-icon">
                                <option value="蔬菜" data-icon="vegetable">蔬菜</option>
                                <option value="水果" data-icon="fruit">水果</option>
                                <option value="餅乾" data-icon="snack">餅乾</option>
                                <option value="飲料" data-icon="drink">飲料</option>
                                <option value="肉類" data-icon="meat">肉類</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="storage-location"><i class="fas fa-map-marker-alt mr-2"></i>存放位置:</label>
                            <input type="text" class="form-control border-info" id="storage-location" name="storage-location" placeholder="例如: 冰箱、櫥櫃">
                        </div>
                        <div class="form-group">
                            <label for="purchase-date"><i class="fas fa-calendar-alt mr-2"></i>購買日期:</label>
                            <input type="date" class="form-control border-info" id="purchase-date" name="purchase-date">
                        </div>
                        <div class="form-group">
                            <label for="quantity"><i class="fas fa-sort-numeric-up mr-2"></i>數量:</label>
                            <div class="input-group">
                                <!-- 自定義的「-」按鈕 -->
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-outline-info" id="decrease-quantity">-</button>
                                </div>
                                <!-- 帶有上下箭頭的 input 元素 -->
                                <input type="number" class="form-control text-center border-info" id="quantity" name="quantity" value="1" min="1">
                                <!-- 自定義的「+」按鈕 -->
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-info" id="increase-quantity">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price"><i class="fas fa-dollar-sign mr-2"></i>金額:</label>
                            <input type="text" class="form-control border-info" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="expiry-date"><i class="fas fa-calendar-check mr-2"></i>有效期限:</label>
                            <input type="date" class="form-control border-info" id="expiry-date" name="expiry-date">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <!-- "新增食物" 按鈕 -->
                <button type="submit" form="food-form" class="btn btn-info btn-block">
                    <i class="fas fa-plus-circle mr-2"></i>新增食物
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <script src="Addandeditscript.js"></script>

</div>