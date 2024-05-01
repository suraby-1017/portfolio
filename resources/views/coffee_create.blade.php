@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h1>新規作成</h1>
    <form method="POST" action="{{ route('coffee.store') }}" enctype="multipart/form-data" class="mt-3">
            @csrf

        <div class="form-group">
            <label for="form-name">メニュー名</label>
            <input type="text" name="name" id="form-name" class="form-control" style="width: 200px;" required>
        </div>

        <div class="form-group">
            <label for="form-base">ベース</label>
            <div class="input-group">
                <select name="base" id="form-base" class="custom-select">
                    <option value="option1">選択肢1</option>
                    <option value="option2">選択肢2</option>
                    <option value="option3">選択肢3</option>
                    <!-- 追加の選択肢を必要に応じてここに追加 -->
                </select>
                <div class="input-group-append" style="flex: 1;">
                    <input type="text" name="custom_base" id="form-custom-base" class="form-control" style="width: 300px;" placeholder="選択肢にないものはここに入力">
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="form-material">作り方</label>
            <input type="text" name="material" id="form-material" class="form-control">
        </div>

        <div class="form-group">
            <label for="form-comment">コメント</label>
            <input type="text" name="comment" id="form-comment" class="form-control">
        </div>

        <div class="form-group">
            <label for="form-image">画像</label>
            <input type="file" name="image" id="form-image" class="form-control-file" onchange="previewImage(this)">
            <img id="image-preview" src="#" alt="画像プレビュー" style="display: none; max-width: 100%; margin-top: 10px;">
        </div>
        {{-- 画像のプレビュー --}}
        <script>
            function previewImage(input) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var imagePreview = document.getElementById('image-preview');
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        </script>


        <div class="form-group">
            <label for="form-sweetness_level">甘さ</label>
            <select name="sweetness_level" id="form-sweetness_level" class="form-control" style="width: 40px;">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="form-group">
            <label for="form-bitterness_level">苦さ</label>
            <select name="bitterness_level" id="form-bitterness_level" class="form-control" style="width: 40px;">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit" class="btn btn-primary">登録</button>

        <a href="{{ route('coffee.index') }}" class="btn btn-secondary">{{ __('一覧へ戻る') }}</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



@endsection