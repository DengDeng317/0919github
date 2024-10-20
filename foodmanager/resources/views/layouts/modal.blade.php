<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-utensils mr-2"></i>新增食物</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="food-form" action="{{ route('calendar') }}" method="post">
                    @csrf

                    <input type="hidden" name="food_category" id="food_category" value="{{ $getFoodCategory->first()->id }}">

                    <div class="form-group">
                        <label for="food-name"><i class="fas fa-carrot mr-2"></i>食物名稱:</label>
                        <input type="text" class="form-control border-success" id="food-name" name="food_name"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="category"><i class="fas fa-th-large mr-2"></i>類別:</label>
                        <div class="custom-dropdown" id="category-dropdown">

                            <div class="form-group">
                                <div class="dropdown w-100">

                                    <button class="btn btn-outline-success dropdown-toggle w-100" type="button"
                                            id="dropdownMenuButton" name="category" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <img
                                                src="@if($getFoodCategory->first()->img_url){{ asset('img/'.$getFoodCategory->first()->img_url) }}@else{{ asset('img/01.jpg') }}@endif"
                                                style="width: 50px;" alt="{{ $getFoodCategory->first()->name }}"
                                                class="dropdown-icon"> {{ $getFoodCategory->first()->name }}
                                    </button>

                                    <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                        @foreach($getFoodCategory as $item)
                                            <div class="dropdown-item" data-value="{{ $item->name }}" data-name="{{ $item->id }}"
                                                 data-img="@if($item->img_url){{ asset('img/'.$item->img_url) }}@else{{ asset('img/01.jpg') }}@endif">
                                                <img
                                                        src="@if($item->img_url){{ asset('img/'.$item->img_url) }}@else{{ asset('img/01.jpg') }}@endif"
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
                        <input type="text" class="form-control border-success" id="storage-location"
                               name="storage_location" placeholder="例如: 冰箱、櫥櫃">
                    </div>
                    <div class="form-group">
                        <label for="purchase-date"><i class="fas fa-calendar-alt mr-2"></i>購買日期:</label>
                        <input type="date" class="form-control border-success" id="purchase-date"
                               name="purchase_date" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity"><i class="fas fa-sort-numeric-up mr-2"></i>數量:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-success text-white" id="decrease-quantity">-
                                </button>
                            </div>
                            <input type="number" class="form-control text-center border-success" id="quantity"
                                   name="quantity" value="1" min="1">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success text-white" id="increase-quantity">+
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price"><i class="fas fa-dollar-sign mr-2"></i>金額:</label>
                        <input type="number" class="form-control border-success" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry-date"><i class="fas fa-calendar-check mr-2"></i>有效期限:</label>
                        <input type="date" class="form-control border-success" id="expiry-date" name="expiry_date"
                               value="{{ date('Y-m-d', strtotime('+3 days')) }}" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <button type="submit" form="food-form" class="btn btn-success btn-block">
                    <i class="fas fa-plus-circle mr-2"></i>新增食物
                </button>
            </div>
        </div>
    </div>
</div>

