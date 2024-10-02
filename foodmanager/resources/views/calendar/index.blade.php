@extends('layouts.app')
@section('active', $active)

@section('main')
    <div class="container p-4 bg-white rounded shadow p-3 mb-5 bg-body" style="max-width: 600px;">
        <h1 class="text-center text-dark">日曆事件管理</h1>
        <div class="month-navigation">
            <button id="prev-month">&lt;</button>
            <input type="month" id="month-picker"/>
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
            <h3>事件列表</h3>
            <button id="confirm-button" style="display:none;">確定</button>
        </div>
    </div>

@endsection

@push('css')

    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@endpush
@push('js')

    <script src="{{ asset('js/calendar.js') }}"></script>
@endpush
