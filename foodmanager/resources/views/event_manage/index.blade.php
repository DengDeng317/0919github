@extends('layouts.app')
@section('active', $active)

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="folder" id="current-folder">
                    <div class="folder-header" onclick="toggleFolder('current')">
                        <span class="arrow" id="arrow-current">▼</span>
                        <img src="icon_current.png" alt="圖示" class="icon">
                        <h2>當前紀錄</h2>
                    </div>
                    <div id="current" class="content">
                        <div class="table-responsive">
                            <div class="container mt-10">
                                <div class="carousel-container">
                                    <button class="btn-nav" id="prevBtn">&#8249;</button>
                                    <div class="card-container" id="cardContainer">
                                        <!-- 卡片內容 -->
                                        @if($getFood_1->count()>0)
                                            @foreach($getFood_1 as $item)
                                                <button type="button"
                                                        data-toggle="modal"
                                                        data-target=".bd-example-modal-lg2"
                                                        data-id="{{ $item->id }}"
                                                        onclick="openModal({{ $item->id }})"
                                                        class="btn p-0 border-0 bg-transparent"
                                                >
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img class="card-img"
                                                                 src="@if($item->img_url){{ asset($item->img_url) }}@else{{ asset('img/01.png') }}@endif">
                                                            <h5 class="card-title">{{ $item->name }}</h5>
                                                            <p class="card-text">過期日期 :<br> {{ $item->expiration_date }}</p>
                                                        </div>
                                                    </div>
                                                </button>
                                            @endforeach
                                        @else
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ asset('img/01.png') }}" alt="圓形圖片" class="card-img">
                                                    <h5 class="card-title">無紀錄</h5>
                                                    <p class="card-text"> </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <button class="btn-nav" id="nextBtn">&#8250;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="folder" id="waste-folder">
                    <div class="folder-header" onclick="toggleFolder('waste')">
                        <span class="arrow" id="arrow-waste">▼</span>
                        <img src="icon_waste.png" alt="圖示" class="icon">
                        <h2>廚餘桶紀錄</h2>
                    </div>
                    <div id="waste" class="content">
                        <div class="table-responsive">
                            <div class="container mt-10">
                                <div class="carousel-container">
                                    <button class="btn-nav" id="prevBtn">&#8249;</button>
                                    <div class="card-container" id="cardContainer">
                                        <!-- 卡片內容 -->
                                        @if($getFood_2->count()>0)
                                            @foreach($getFood_2 as $item)
                                                <button type="button"
                                                        data-toggle="modal"
                                                        data-target=".bd-example-modal-lg2"
                                                        data-id="{{ $item->id }}"
                                                        onclick="openModal({{ $item->id }})"
                                                        class="btn p-0 border-0 bg-transparent"
                                                >
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img class="card-img"
                                                                 src="@if($item->img_url){{ asset($item->img_url) }}@else{{ asset('img/01.png') }}@endif">
                                                            <h5 class="card-title">{{ $item->name }}</h5>
                                                            <p class="card-text">過期日期 :<br> {{ $item->expiration_date }}</p>
                                                        </div>
                                                    </div>
                                                </button>
                                            @endforeach
                                        @else
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ asset('img/01.png') }}" alt="圓形圖片" class="card-img">
                                                    <h5 class="card-title">無紀錄</h5>
                                                    <p class="card-text"> </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <button class="btn-nav" id="nextBtn">&#8250;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="folder" id="finished-folder">
                    <div class="folder-header" onclick="toggleFolder('finished')">
                        <span class="arrow" id="arrow-finished">▼</span>
                        <img src="icon_finished.png" alt="圖示" class="icon">
                        <h2>吃完紀錄</h2>
                    </div>
                    <div id="finished" class="content">
                        <div class="table-responsive">
                            <div class="container mt-10">
                                <div class="carousel-container">
                                    <button class="btn-nav" id="prevBtn">&#8249;</button>
                                    <div class="card-container" id="cardContainer">
                                        <!-- 卡片內容 -->
                                        @if($getFood_3->count()>0)
                                            @foreach($getFood_3 as $item)
                                                <button type="button"
                                                        data-toggle="modal"
                                                        data-target=".bd-example-modal-lg2"
                                                        data-id="{{ $item->id }}"
                                                        onclick="openModal({{ $item->id }})"
                                                        class="btn p-0 border-0 bg-transparent"
                                                >
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <img class="card-img"
                                                                 src="@if($item->img_url){{ asset($item->img_url) }}@else{{ asset('img/01.png') }}@endif">
                                                            <h5 class="card-title">{{ $item->name }}</h5>
                                                            <p class="card-text">過期日期 :<br> {{ $item->expiration_date }}</p>
                                                        </div>
                                                    </div>
                                                </button>
                                            @endforeach
                                        @else
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ asset('img/01.png') }}" alt="圓形圖片" class="card-img">
                                                    <h5 class="card-title">無紀錄</h5>
                                                    <p class="card-text"> </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <button class="btn-nav" id="nextBtn">&#8250;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('layouts.modal')
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/event_manage.css') }}">
@endpush
@push('js')
    <script src="{{ asset('js/addandedit.js') }}"></script>
    <script src="{{ asset('js/event_manage.js') }}"></script>

    <script>

        function openModal(id) {

            $.ajax({
                url: '{{ route("getFoodDetails", ":id") }}'.replace(':id', id),
                type: 'GET',
                success: function (response) {
                    // 假設 response 是 JSON 格式的回傳資料
                    $('#food_id_r').val(response.id);  // 填充食物名稱
                    $('#food_name_r').val(response.food_name);  // 填充食物名稱
                    $('#food_category_r').val(response.food_category_r);  // 填充食物名稱
                    $('#storage_location_r').val(response.storage_location);  // 填充存放位置
                    $('#purchase_date_r').val(response.purchase_date);  // 填充購買日期
                    $('#quantity_r').val(response.quantity);  // 填充數量
                    $('#price_r').val(response.price);  // 填充價格
                    $('#expiry_date_r').val(response.expiration_date);  // 填充有效期限
                    $('#food_status_r').val(response.status);  // 填充食物狀態

                    // 類別下拉選單更新邏輯

                    const categoryElement = document.getElementById('dropdownMenuButton_r');
                    categoryElement.innerHTML = `
                        <span id="selected_category_r">
                            <img
                                src="${response.category_img_url}"
                                style="width: 50px;" alt="${response.category}"
                                class="dropdown-icon">
                            ${response.category}
                        </span>
                    `;
                },
                error: function (xhr) {
                    console.log('Error:', xhr);
                }
            });
        }
    </script>
@endpush
