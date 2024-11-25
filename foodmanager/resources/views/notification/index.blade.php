@extends('layouts.app')
@section('active', $active)

@section('main')
    <div class="notification-settings-container col-3">
        <form id="profileForm" action="{{ route('notification') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Mail 通知開關 -->
            <div class="notification-option mail-notification">
                <label for="mailNotificationSwitch">是否接收 Mail 通知</label>
                <label class="switch">
                    <input type="checkbox" id="mailNotificationSwitch" name="email" @if($getUser->email_open)
                        {{ 'checked' }}
                            @endif>
                    <span class="slider"></span>
                </label>
                <div class="warning-container">
                    <p class="warning-text">如果開啟此功能，可能每天都會收到一封 E-mail</p>
                </div>
            </div>

            <!-- LINE 通知開關 -->
            <div class="notification-option">
                <label for="lineNotificationSwitch">是否接收 LINE 通知</label>
                <label class="switch">
                    <input type="checkbox" id="lineNotificationSwitch" name="line" @if($getUser->line_open)
                        {{ 'checked' }}
                            @endif>
                    <span class="slider"></span>
                </label>
            </div>

            <!-- 提醒即將過期的天數 -->
            <div class="notification-option">
                <label for="expirationDays">食物即將過期幾天前提醒：</label>
                <input type="number" id="expirationDays" name="days" min="1"
                       value="@if($getUser->days){{ $getUser->days }}@else{{ '3' }}@endif">
            </div>

            <button type="submit" class="btn btn-primary">儲存修改</button>
        </form>
        <div class="text-center">
            <img src="{{ asset('img/QRCode.png') }}" alt="">
            <div>
                <p class="warning-text">如要啟用此功能，請先加入官方賴！</p>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/notification.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/notification.js') }}"></script>

    <script>

        @if(session()->has('message'))
            window.onload = function() {
            alert('{{ session()->get('message')}}');
        };
        @endif
    </script>
@endpush
