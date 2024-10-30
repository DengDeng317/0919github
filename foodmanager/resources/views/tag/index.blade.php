@extends('layouts.app')
@section('active', $active)

@section('main')
    <!-- 白色容器包裹整個標籤管理頁面 -->
    <div class="container mt-5 white-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>標籤管理</h2>
            <button id="addTagButton" class="btn btn-success">新增標籤</button>
        </div>

        <div id="tagList" class="d-flex flex-wrap">
            <!-- 標籤列表，動態生成 -->
        </div>
    </div>

    <!-- 編輯/新增標籤的互動視窗（Modal） -->
    <div class="modal fade" id="editTagModal" tabindex="-1" role="dialog" aria-labelledby="editTagModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTagModalLabel">標籤編輯</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editTagForm" action="{{ route('tag.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="tagId" name="id" value=""> <!-- 隱藏的 ID 輸入欄位 -->
                        <div class="form-group">
                            <label for="tagName">標籤名稱</label>
                            <input type="text" id="tagName" class="form-control" name="name" placeholder="輸入標籤名稱"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="tagImage">選擇圖片</label>
                            <input type="file" id="tagImage" class="form-control-file" name="image" accept="image/*"
                                   onchange="previewImage(event)">
                            <img id="imagePreview" src="" class="mt-3"
                                 style="display: none; max-width: 100%; height: auto;">
                        </div>
                    </form>
                </div>
                <!-- 按鈕區域 -->
                <div class="modal-footer justify-content-between">
                    <button type="submit" form="editTagForm" class="btn btn-primary save-btn">保存變更</button>
                    <button type="button" id="deleteTagButton" class="btn btn-danger delete-btn" style="display: none;">
                        刪除標籤
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- 編輯/新增標籤的互動視窗（Modal） -->
    <div class="modal fade" id="addTagModal" tabindex="-1" role="dialog" aria-labelledby="addTagModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTagModalLabel">新增標籤</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addTagForm" action="{{ route('tag.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                        <div class="form-group">
                            <label for="tagName">標籤名稱</label>
                            <input type="text" id="tagName" class="form-control" name="name" placeholder="輸入標籤名稱"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="tagImage">選擇圖片</label>
                            <input type="file" id="tagImage" class="form-control-file" name="image" accept="image/*"
                                   onchange="previewImage(event)">
                            <img id="imagePreview" src="" class="mt-3"
                                 style="display: none; max-width: 100%; height: auto;">
                        </div>
                    </form>
                </div>
                <!-- 按鈕區域 -->
                <div class="modal-footer justify-content-between">
                    <button type="submit" form="addTagForm" class="btn btn-primary save-btn">保存變更</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')

    <link href="{{ asset('css/tag.css') }}" rel="stylesheet">
@endpush

@push('js')
    <script>
        let tags = [
                @foreach($getFoodCategory as $item)
            {
                name: '{{ $item->name }}', image: '{{ asset($item->img_url) }}', id: '{{ $item->id }}'
            },
            @endforeach
        ];
    </script>
    <script src="{{ asset('js/tag.js') }}"></script>

    <script>

        @if(session()->has('message'))
        window.onload = function() {
            alert('{{ session()->get('message')}}');
        };
        @endif
        // 刪除標籤
        document.getElementById('deleteTagButton').addEventListener('click', () => {
            if (currentTagIndex !== null) {
                const tagId = tags[currentTagIndex].id; // 抓取當前標籤的 id

                // AJAX 請求
                $.ajax({
                    url: '{{ route('tag.delete', '') }}' + '/' + tagId,  // 後端刪除路由
                    method: 'get',
                    success: function (response) {

                        if (response.status == true) {
                            // 成功刪除後，從 tags 陣列中刪除標籤並重新渲染
                            tags.splice(currentTagIndex, 1);
                            $('#editTagModal').modal('hide');
                            renderTags(); // 重新渲染標籤列表
                        }
                        alert(response.message);
                    },
                    error: (error) => {
                        console.error('Error deleting tag:', error);
                    }
                });

            }
        });
    </script>
@endpush
