@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>新規投稿</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('timeline.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="form-title">タイトル</label>
            <input type="text" name="title" id="form-title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="form-description">内容</label>
            <input type="text" name="description" id="form-description" class="form-control">
        </div>

        <div class="form-group">
            <label for="form-image_path">画像</label>
            <input type="file" name="image_path" id="form-image_path" class="form-control-file" onchange="previewImage(event)">
            <img id="image-preview" src="#" alt="Image Preview" style="max-width: 200px; display: none;">
        </div>

        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function(){
                    var imgElement = document.getElementById('image-preview');
                    imgElement.src = reader.result;
                    imgElement.style.display = 'block';
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>

        <button type="submit" class="btn btn-primary">投稿</button>

        <a href="{{ route('timeline.index') }}" class="btn btn-secondary">{{ __('投稿一覧へ戻る') }}</a>
    </form>
</div>


@endsection
