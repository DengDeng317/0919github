<div class="row">
    <div class="col-12">

<h1>食物庫存管理</h1>
                    <form id="food-form">
                        <div class="form-group">
                            <label for="food-name">食物名稱:</label>
                            <input type="text" id="food-name" name="food-name" required>
                        </div>
                        <div class="form-group">
                            <label for="category">類別:</label>
                            <select id="category" name="category">
                                <option value="蔬菜">蔬菜</option>
                                <option value="水果">水果</option>
                                <option value="餅乾">餅乾</option>
                                <option value="飲料">飲料</option>
                                <option value="肉類">肉類</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="storage-location">存放位置:</label>
                            <input type="text" id="storage-location" name="storage-location" placeholder="例如: 冰箱、櫥櫃">
                        </div>
                        <div class="form-group">
                            <label for="purchase-date">購買日期:</label>
                            <input type="date" id="purchase-date" name="purchase-date">
                        </div>
                        <div class="form-group">
                            <label for="quantity">數量:</label>
                            <div class="quantity-control">
                                <button type="button" id="decrease-quantity">-</button>
                                <input type="number" id="quantity" name="quantity" value="1" min="1">
                                <button type="button" id="increase-quantity">+</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="expiry-date">有效期限:</label>
                            <input type="date" id="expiry-date" name="expiry-date">
                        </div>
                        <button type="submit">新增食物</button>
                    </form>
                    </div>
                    </div>