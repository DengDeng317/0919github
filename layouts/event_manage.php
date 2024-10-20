<link rel="stylesheet" href="event_manage.css"><!-- 事件管理的CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
    <div class="position-fixed" style="right: 13px; bottom: 80px;">
        <button type="button" class="btn btn-success btn-lg rounded-circle shadow" id="floatingBtn" data-toggle="modal" data-target=".bd-example-modal-lg">
            <i class="fas fa-plus"></i>
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
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
                            <input type="text" class="form-control border-success" id="food-name" name="food-name" required>
                        </div>
                        <div class="form-group">
                            <label for="category"><i class="fas fa-th-large mr-2"></i>類別:</label>
                            <div class="custom-dropdown" id="category-dropdown">

                                <div class="form-group">
                                    <div class="dropdown w-100">
                                        <button class="btn btn-outline-success dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="img/01.png" alt="蔬菜" class="dropdown-icon"> 蔬菜
                                        </button>
                                        <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                            <div class="dropdown-item" data-value="蔬菜" data-img="img/01.png">
                                                <img src="img/01.png" alt="蔬菜" class="dropdown-icon"> 蔬菜
                                            </div>
                                            <div class="dropdown-item" data-value="水果" data-img="img/fruit-icon.png">
                                                <img src="img/fruit-icon.png" alt="水果" class="dropdown-icon"> 水果
                                            </div>
                                            <div class="dropdown-item" data-value="餅乾" data-img="img/snack-icon.png">
                                                <img src="img/snack-icon.png" alt="餅乾" class="dropdown-icon"> 餅乾
                                            </div>
                                            <div class="dropdown-item" data-value="飲料" data-img="img/drink-icon.png">
                                                <img src="img/drink-icon.png" alt="飲料" class="dropdown-icon"> 飲料
                                            </div>
                                            <div class="dropdown-item" data-value="肉類" data-img="img/meat-icon.png">
                                                <img src="img/meat-icon.png" alt="肉類" class="dropdown-icon"> 肉類
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <input type="hidden" id="category" name="category" value="蔬菜">
                        </div>
                        <div class="form-group">
                            <label for="storage-location"><i class="fas fa-map-marker-alt mr-2"></i>存放位置:</label>
                            <input type="text" class="form-control border-success" id="storage-location" name="storage-location" placeholder="例如: 冰箱、櫥櫃">
                        </div>
                        <div class="form-group">
                            <label for="purchase-date"><i class="fas fa-calendar-alt mr-2"></i>購買日期:</label>
                            <input type="date" class="form-control border-success" id="purchase-date" name="purchase-date">
                        </div>
                        <div class="form-group">
                            <label for="quantity"><i class="fas fa-sort-numeric-up mr-2"></i>數量:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-success text-white" id="decrease-quantity">-</button>
                                </div>
                                <input type="number" class="form-control text-center border-success" id="quantity" name="quantity" value="1" min="1">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success text-white" id="increase-quantity">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price"><i class="fas fa-dollar-sign mr-2"></i>金額:</label>
                            <input type="text" class="form-control border-success" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="expiry-date"><i class="fas fa-calendar-check mr-2"></i>有效期限:</label>
                            <input type="date" class="form-control border-success" id="expiry-date" name="expiry-date">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="submit" form="food-form" class="btn btn-success btn-block">
                    <i class="fas fa-plus-circle mr-2"></i>新增食物
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="Addandeditscript.js"></script>
    <script src="event_manage.js"></script>
</div>