@extends('layouts.app')
@section('active', $active)

@section('main')

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


    <div class="container-fluid">
    </div>

@endsection

@push('css')

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@push('js')

    <script src="{{ asset('js/home.js') }}"></script>

@endpush
