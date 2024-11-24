<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-utensils mr-2"></i>新增食物</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="food-form" action="{{ route('calendar') }}" method="post">
                    @csrf

                    <input type="hidden" name="food_category" id="food_category"
                        value="{{ $getFoodCategory->first()->id }}">

                    <div class="form-group">
                        <label for="food-name"><i class="fas fa-carrot mr-2"></i>食物名稱:</label>
                        <input type="text" class="form-control border-primary" id="food-name" name="food_name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="category"><i class="fas fa-th-large mr-2"></i>類別:</label>
                        <div class="custom-dropdown" id="category-dropdown">

                            <div class="form-group">
                                <div class="dropdown w-100">

                                    <button class="btn btn-outline-primary dropdown-toggle w-100" type="button"
                                        id="dropdownMenuButton" name="category" data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        <img
                                            src="@if($getFoodCategory->first()->img_url){{ asset($getFoodCategory->first()->img_url) }}@else{{ asset('img/01.png') }}@endif"
                                            style="width: 50px;" alt="{{ $getFoodCategory->first()->name }}"
                                            class="dropdown-icon"> {{ $getFoodCategory->first()->name }}
                                    </button>

                                    <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                        @foreach($getFoodCategory as $item)
                                        <div class="dropdown-item"
                                            data-value="{{ $item->name }}"
                                            data-name="{{ $item->id }}"
                                            data-img="@if($item->img_url){{ asset($item->img_url) }}@else{{ asset('img/01.png') }}@endif">
                                            <img
                                                src="@if($item->img_url){{ asset($item->img_url) }}@else{{ asset('img/01.png') }}@endif"
                                                style="width: 50px;" alt="{{ $item->name }}"
                                                class="dropdown-icon img-thumbnail"> {{ $item->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="form-group">
                        <label for="storage-location"><i class="fas fa-map-marker-alt mr-2"></i>存放位置:</label>
                        <input type="text" class="form-control border-primary" id="storage-location"
                            name="storage_location" placeholder="例如: 冰箱、櫥櫃">
                    </div>
                    <div class="form-group">
                        <label for="purchase-date"><i class="fas fa-calendar-alt mr-2"></i>購買日期:</label>
                        <input type="date" class="form-control border-primary" id="purchase-date"
                            name="purchase_date" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity"><i class="fas fa-sort-numeric-up mr-2"></i>數量:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary text-white" id="decrease-quantity">-
                                </button>
                            </div>
                            <input type="number" class="form-control text-center border-primary" id="quantity"
                                name="quantity" value="1" min="1">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary text-white" id="increase-quantity">+
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price"><i class="fas fa-dollar-sign mr-2"></i>金額:</label>
                        <input type="number" class="form-control border-primary" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry-date"><i class="fas fa-calendar-check mr-2"></i>有效期限:</label>
                        <input type="date" class="form-control border-primary" id="expiry-date" name="expiry_date"
                            value="{{ date('Y-m-d', strtotime('+3 days')) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="food-status"><i class="fas fa-info-circle mr-2"></i>食物狀態:</label>
                        <select class="form-control border-primary" id="food-status" name="food_status">
                            <option value="未過期" selected>未過期</option>
                            <option value="過期">過期</option>
                            <option value="完成">完成</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <button type="submit" form="food-form" class="btn btn-primary btn-block">
                    <i class="fas fa-plus-circle mr-2"></i>新增食物
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-utensils mr-2"></i>修改食物</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="food_form_r" action="{{ route('calendar.update') }}" method="post">
                @csrf

                <input type="hidden" name="food_category" id="food_category_r" value="">

                <div class="modal-body">
                    <input type="hidden" name="food_id" id="food_id_r" value="">
                    <div class="form-group">
                        <label for="food-name"><i class="fas fa-carrot mr-2"></i>食物名稱:</label>
                        <input type="text" class="form-control border-primary" id="food_name_r" name="food_name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="category"><i class="fas fa-th-large mr-2"></i>類別:</label>
                        <div class="custom-dropdown" id="category_dropdown_r">
                            <div class="form-group">
                                <div class="dropdown w-100">
                                    <button class="btn btn-outline-primary dropdown-toggle w-100" type="button"
                                        id="dropdownMenuButton_r" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <span id="selected_category_r"></span>
                                    </button>

                                    <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton_r">
                                        @foreach($getFoodCategory as $item)
                                        <div class="dropdown-item category_item_r dropdown_item_r"
                                            data-value="{{ $item->name }}"
                                            data-id="{{ $item->id }}"
                                            data-name="{{ $item->id }}"
                                            data-img="@if($item->img_url){{ asset($item->img_url) }}@else{{ asset('img/01.png') }}@endif">
                                            <img src="@if($item->img_url){{ asset($item->img_url) }}@else{{ asset('img/01.png') }}@endif"
                                                style="width: 50px;" alt="{{ $item->name }}"
                                                class="dropdown-icon img-thumbnail"> {{ $item->name }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="storage-location"><i class="fas fa-map-marker-alt mr-2"></i>存放位置:</label>
                        <input type="text" class="form-control border-primary" id="storage_location_r"
                            name="storage_location" placeholder="例如: 冰箱、櫥櫃">
                    </div>
                    <div class="form-group">
                        <label for="purchase-date"><i class="fas fa-calendar-alt mr-2"></i>購買日期:</label>
                        <input type="date" class="form-control border-primary" id="purchase_date_r" name="purchase_date"
                            value="" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity"><i class="fas fa-sort-numeric-up mr-2"></i>數量:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary text-white" id="decrease_quantity_r">-
                                </button>
                            </div>
                            <input type="number" class="form-control text-center border-primary" id="quantity_r"
                                name="quantity" value="1" min="1">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary text-white" id="increase_quantity_r">+
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price"><i class="fas fa-dollar-sign mr-2"></i>金額:</label>
                        <input type="number" class="form-control border-primary" id="price_r" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry-date"><i class="fas fa-calendar-check mr-2"></i>有效期限:</label>
                        <input type="date" class="form-control border-primary" id="expiry_date_r" name="expiry_date"
                            value="" required>
                    </div>
                    <div class="form-group">
                        <label for="food-status"><i class="fas fa-info-circle mr-2"></i>食物狀態:</label>
                        <select class="form-control border-primary" id="food_status_r" name="food_status">
                            <option value="未過期" selected>未過期</option>
                            <option value="過期">過期</option>
                            <option value="完成">完成</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="submit" form="food_form_r" class="btn btn-primary btn-block">
                        <i class="fas fa-plus-circle mr-2"></i>修改食物
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>