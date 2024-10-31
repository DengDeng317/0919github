@extends('layouts.app')
@section('active', $active)

@section('main')

    <div class="profile-edit-container col-3">
        <h2>個人資料修改</h2>
        <form id="profileForm" action="{{ route('personal') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="image-upload">
                <img id="profileImage" src="{{ ($getUser->img_url)?:"" }}" alt="大頭照">
                <input type="file" id="fileInput" name="image" accept="image/*">
                <button type="button" onclick="uploadImage()">上傳大頭照</button>
            </div>
            <div class="name-edit">
                <label for="username">名稱：</label>
                <input type="text" id="username" name="username" value="{{ $getUser->username }}">
            </div>
            <button type="submit">儲存修改</button>
        </form>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/personal.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/personal.js') }}"></script>
    <script>

        @if(session()->has('message'))
            window.onload = function() {
            alert('{{ session()->get('message')}}');
        };
        @endif
    </script>
@endpush
