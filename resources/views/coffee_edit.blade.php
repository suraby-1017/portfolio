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

<form method="POST" action="{{route('coffee.update',['id' =>$coffee->id])}}" enctype="multipart/form-data" class="mt-3">
    @csrf

<div class="form-group">
    <label for="name">メニュー名</label>
    <input type="text" name="name" id="name" class="form-control"  style="width: 200px;" value="{{$coffee->name}}">
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
    <label for="material">作り方</label>
    <input type="text" name="material" id="material" class="form-control" value="{{$coffee->material}}">
</div>

<div class="form-group">
    <label for="comment">コメント</label>
    <input type="text" name="comment" id="comment" class="form-control" value="{{$coffee->comment}}">
</div>

<div class="form-group">
    <label for="image">画像</label>
    <img id="image-preview" src="{{ asset('storage/' . $coffee->image) }}" width="150" alt="coffee-image" class="d-block mb-2">
    <input type="file" name="image" id="image" class="form-control-file" onchange="previewImage(event)">
</div>
{{-- 選択された画像のプレビュー --}}
<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var imgElement = document.getElementById('image-preview');
            imgElement.src = reader.result;
        }
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

        <button type="submit" class="btn btn-primary">更新する</button>

        <a href="{{route('coffee.show',['id'=>$coffee->id])}}" class="btn btn-secondary">詳細に戻る</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection