@extends('layouts.app')
@section('active', $active)

@section('main')
    <div class="container mb-2">


        <div id="upcoming-expiry-container">
            <p class="h4" style="font-weight:bold ;color:black">即將過期的物品TOP5</p>
            <!-- 即將過期的物品展示區域（在日曆事件管理容器外面，整個容器上方） -->
            <div id="upcoming-expiry" class="upcoming-expiry">
                <!-- 這裡會動態插入即將過期的物品 -->
                <!-- 第1個物品 -->
                <a href="apple-details.html" class="upcoming-item">
                    <p>蘋果</p>
                    <img src="{{ asset('img/food_fruit_sandwich_ichigo.png') }}">
                    <p>過期日期: 2024-09-28</p>
                </a>

                <!-- 第2個物品 -->
                <a href="milk-details.html" class="upcoming-item">
                    <p>蘋果</p>
                    <img src="image.png" alt="蘋果">
                    <p>過期日期: 2024-09-28</p>
                </a>

                <!-- 第3個物品 -->
                <a href="bread-details.html" class="upcoming-item">
                    <p>蘋果</p>
                    <img src="apple.jpg" alt="蘋果">
                    <p>過期日期: 2024-09-28</p>
                </a>

                <!-- 第4個物品 -->
                <a href="egg-details.html" class="upcoming-item">
                    <p>蘋果</p>
                    <img src="apple.jpg" alt="蘋果">
                    <p>過期日期: 2024-09-28</p>
                </a>

                <!-- 第5個物品 -->
                <a href="egg-details.html" class="upcoming-item">
                    <p>蘋果</p>
                    <img src="apple.jpg" alt="蘋果">
                    <p>過期日期: 2024-09-28</p>
                </a>
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
            '2024-09-18': [
                {name: '蘋果', image: '{{ asset('img/food_fruit_sandwich_ichigo.png') }}', expiry: '2024-09-28'},
                {name: '牛奶', image: 'milk.jpg', expiry: '2024-09-28'}
            ],
            '2024-09-29': [
                {name: '麵包', image: 'bread.jpg', expiry: '2024-09-29'}
            ],
            '2024-10-19': [
                {name: '蘋果', image: 'apple.jpg', expiry: '2024-09-28'},
                {name: '牛奶', image: 'milk.jpg', expiry: '2024-09-28'}
            ],
            '2024-10-28': [
                {name: '蘋果', image: 'apple.jpg', expiry: '2024-10-28'},
                {name: '牛奶', image: 'milk.jpg', expiry: '2024-10-28'}
            ]
        };
    </script>
    <script src="{{ asset('js/calendar.js') }}"></script>
    <script src="{{ asset('js/addandedit.js') }}"></script>
    <script>
        $(document).ready(function() {
            // 監聽下拉選單的選項
            $('.dropdown-item').on('click', function() {
                var food_category = $(this).data('name');

                // 將選中的值放入隱藏的表單欄位中
                $('#food_category').val(food_category);

            });

            // 當表單提交時，檢查是否已經選擇新值
            $('#dropdownForm').on('submit', function(event) {
                // 如果沒有選擇新值，就使用按鈕上顯示的預設值
                var food_category = $('#dropdownMenuButton').val();

                if (!food_category) {
                    $('#food_category').val(food_category); // 更新隱藏欄位
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.dropdown-item').on('click', function() {
                var selectedValue = $(this).data('value'); // 取得 data-value 值
                var selectedImg = $(this).data('img'); // 取得 data-img 值

                // 建立一個臨時的 Image 物件來檢查圖片的實際大小
                var img = new Image();
                img.src = selectedImg;

                img.onload = function() {

                    // 如果圖片寬度大於 50px，設定 max-width: 50px
                    var imgStyle = 'style="width: 50px;"';

                    // 更新按鈕內容
                    $('#dropdownMenuButton').html('<img src="' + selectedImg + '" alt="' + selectedValue + '" class="dropdown-icon" ' + imgStyle + '> ' + selectedValue);
                };
            });
        });


    </script>
@endpush
