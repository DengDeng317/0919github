@extends('layouts.app')
@section('active', $active)

@section('main')
    <div class="container bg-white my-5 p-3 rounded shadow p-3 mb-5 bg-body" style="max-width: 600px;">

        <h1 class="text-center mb-3">食物庫存管理</h1>
        <form id="food-form" action="{{ route('food_stock_manager') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="food-name">食物名稱:</label>
                <input type="text" id="food-name" name="food-name" required>
            </div>
            <div class="form-group">
                <label for="category">類別:</label>
                <select id="category" name="category">
                    @foreach($getFoodCategory as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="storage-location">存放位置:</label>
                <input type="text" id="storage-location" name="storage-location" placeholder="例如: 冰箱、櫥櫃">
            </div>
            <div class="form-group">
                <label for="purchase-date">購買日期:</label>
                <input type="date" id="purchase-date" name="purchase-date" required>
            </div>
            <div class="form-group">
                <label for="quantity">數量:</label>
                <div class="quantity-control">
                    <button type="button" id="decrease-quantity">-</button>
                    <input type="number" id="quantity" name="quantity" value="1" min="1">
                    <button type="button" id="increase-quantity">+</button>
                </div>
                <label for="quantity">金額:</label>
                <input type="text" id="food-name" name="food-name" required>
            </div>
            <div class="form-group">
                <label for="expiry-date">有效期限:</label>
                <input type="date" id="expiry-date" name="expiry-date" required>
            </div>
            <button type="submit">新增食物</button>
        </form>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/addandedit.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/addandedit.js') }}"></script>
@endpush
