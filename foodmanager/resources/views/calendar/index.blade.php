@extends('layouts.app')
@section('active', $active)

@section('main')
    <div class="container mb-2">


        <div id="upcoming-expiry-container">
            <p class="h4" style="font-weight:bold ;color:black">即將過期的物品TOP5</p>
            <!-- 即將過期的物品展示區域（在日曆事件管理容器外面，整個容器上方） -->
            <div id="upcoming-expiry" class="upcoming-expiry">
                <!-- 這裡會動態插入即將過期的物品 -->
                @foreach($lastFood as $item)

                    <button type="button" class="upcoming-item"
                            data-toggle="modal"
                            data-target=".bd-example-modal-lg2">
                        <p>{{ $item->name }}</p>
                        <img
                            src="@if($item->img_url){{ asset('img/'.$item->img_url) }}@else{{ asset('img/01.png') }}@endif">
                        <p>過期日期: {{ $item->expiration_date }}</p>
                    </button>
                @endforeach
            </div>
        </div>
    </div>


    <div class="container">
        <h1 class="h3" style="font-weight:bold ;color:black">日曆事件管理</h1>

        <div class="month-navigation">
            <button id="prev-month">&lt;</button>
            <input type="month" id="month-picker">
            <button id="next-month">&gt;</button>
        </div>

        <div class="weekdays">
            <div>週日</div>
            <div>週一</div>
            <div>週二</div>
            <div>週三</div>
            <div>週四</div>
            <div>週五</div>
            <div>週六</div>
        </div>
        <div id="calendar"></div>
        <div id="events">
            <h3>食物列表</h3>
            <div id="event-list"></div>
        </div>
    </div>

    <!-- 浮動按鈕 -->
    <div class="fixed-bottom">
        <div class="position-fixed" style="right: 13px; bottom: 80px;">
            <button type="button" class="btn btn-success btn-lg rounded-circle shadow" id="floatingBtn"
                    data-toggle="modal"
                    data-target=".bd-example-modal-lg">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    @include('layouts.modal')
@endsection

@push('css')

    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@endpush
@push('js')
    <script>
        const events = {
            @foreach($allFood as $item => $value)
            '{{ $item }}': [
                    @foreach($value as $value2)
                {
                    name: '{{ $value2->name }}',
                    image: '@if($value2->img_url){{ asset('img/'.$value2->img_url) }}@else{{ asset('img/01.png') }}@endif'
                },
                @endforeach
            ],
            @endforeach
        };
    </script>
    <script src="{{ asset('js/calendar.js') }}"></script>
    <script src="{{ asset('js/addandedit.js') }}"></script>
    <script>
        $(document).ready(function () {
            // 監聽下拉選單的選項
            $('.dropdown-item').on('click', function () {
                var food_category = $(this).data('name');

                // 將選中的值放入隱藏的表單欄位中
                $('#food_category').val(food_category);

            });

            // 當表單提交時，檢查是否已經選擇新值
            $('#dropdownForm').on('submit', function (event) {
                // 如果沒有選擇新值，就使用按鈕上顯示的預設值
                var food_category = $('#dropdownMenuButton').val();

                if (!food_category) {
                    $('#food_category').val(food_category); // 更新隱藏欄位
                }
            });
        });
        $(document).ready(function () {
            $('.dropdown-item').on('click', function () {
                var selectedValue = $(this).data('value'); // 取得 data-value 值
                var selectedImg = $(this).data('img'); // 取得 data-img 值
                // 更新按鈕內容
                $('#dropdownMenuButton').html('<img src="' + selectedImg + '" alt="' + selectedValue + '" class="dropdown-icon"> ' + selectedValue);
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            $('.dropdown-item').on('click', function () {
                var selectedValue = $(this).data('value'); // 取得 data-value 值
                var selectedImg = $(this).data('img'); // 取得 data-img 值

                // 建立一個臨時的 Image 物件來檢查圖片的實際大小
                var img = new Image();
                img.src = selectedImg;

                img.onload = function () {

                    // 如果圖片寬度大於 50px，設定 max-width: 50px
                    var imgStyle = 'style="width: 50px;"';

                    // 更新按鈕內容
                    $('#dropdownMenuButton').html('<img src="' + selectedImg + '" alt="' + selectedValue + '" class="dropdown-icon" ' + imgStyle + '> ' + selectedValue);
                };
            });
        });

        function openModal(button) {
            var id = $(button).data('id');  // 從按鈕取得資料ID

            $.ajax({
                url: '{{ route('getFoodDetails',' + id + ') }}',  // 用正確的路由替換
                type: 'GET',
                success: function (response) {
                    // 假設 response 是 JSON 格式的回傳資料
                    $('#food-name').val(response.food_name);  // 填充食物名稱
                    $('#storage-location').val(response.storage_location);  // 填充存放位置
                    $('#purchase-date').val(response.purchase_date);  // 填充購買日期
                    $('#quantity').val(response.quantity);  // 填充數量
                    $('#price').val(response.price);  // 填充價格
                    $('#expiry-date').val(response.expiry_date);  // 填充有效期限
                    $('#food-status').val(response.food_status);  // 填充食物狀態

                    // 類別下拉選單更新邏輯
                    var selectedCategory = response.category;
                    $('#dropdownMenuButton').text(selectedCategory);  // 更新選中的類別
                },
                error: function (xhr) {
                    console.log('Error:', xhr);
                }
            });
        }

    </script>
@endpush
