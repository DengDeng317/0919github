@extends('layouts.app')
@section('active', $active)

@section('main')
    <div class="password-reset-container col-6">
        <h2>修改密碼</h2>
        <form id="password-reset-form" method="post" action="{{ route('password.reset') }}">
            @csrf
            <div class="form-group">
                <label for="current-password">目前密碼：</label>
                <input type="password" id="current-password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new-password">新密碼：</label>
                <input type="password" id="new-password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">確認新密碼：</label>
                <input type="password" id="confirm-password" name="confirm_password" required>
            </div>
            <button type="submit">提交</button>
        </form>
        <div id="message"></div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/password-reset.css') }}">
@endpush

@push('js')
    <script>
        document.getElementById('password-reset-form').addEventListener('submit', function (event) {
            event.preventDefault();

            const currentPassword = document.getElementById('current-password').value;
            const newPassword = document.getElementById('new-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const messageElement = document.getElementById('message');

            // 清空之前的消息
            messageElement.textContent = '';

            // 驗證新密碼是否符合要求（這裡假設至少 8 個字符）
            if (newPassword.length < 8) {
                messageElement.textContent = '新密碼必須至少包含 8 個字符';
                return;
            }

            // 確認新密碼是否一致
            if (newPassword !== confirmPassword) {
                messageElement.textContent = '新密碼和確認密碼不一致';
                return;
            }

            // 可以在這裡進行後端 API 請求來修改密碼

            $.ajax({
                url: '{{ route("password.reset.store") }}',
                method: 'post',
                data: {
                    userID: {{ \Illuminate\Support\Facades\Auth::id() }},
                    currentPassword: currentPassword,
                    newPassword: newPassword,
                    confirmPassword: confirmPassword
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'  // 添加CSRF Token
                },
                success: function (response) {
                    document.getElementById('current-password').value = '';
                    document.getElementById('new-password').value = '';
                    document.getElementById('confirm-password').value = '';
                    if(response.status == true)
                    {
                        messageElement.style.color = 'green';
                        messageElement.textContent = response.message;
                    } else {
                        messageElement.style.color = 'red';
                        messageElement.textContent = response.message;
                    }
                },
                error: function (xhr) {
                    console.log('Error:', xhr);
                }
            });
        });

    </script>
@endpush
