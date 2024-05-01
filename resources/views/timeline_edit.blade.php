@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>編集</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{route('timeline.update',['id' =>$item->id])}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$item->title}}">
        </div>

        <div class="form-group">
            <label for="description">内容</label>
            <input type="text" name="description" id="description" class="form-control" value="{{$item->description}}">
        </div>

        <div class="form-group">
            <label for="image_path">画像</label>
            <img id="image-preview" src="{{ asset('storage/' . $item->image_path) }}" width="150" alt="post-image" class="d-block mb-2">
            <input type="file" name="image_path" id="image_path" class="form-control-file" onchange="previewImage(event)">
        </div>

        <button type="submit" class="btn btn-primary">更新する</button>

        <a href="{{route('timeline.show',['id'=>$item->id])}}" class="btn btn-secondary">{{ __('詳細に戻る') }}</a>
    </form>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var imgElement = document.getElementById('image-preview');
            imgElement.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
