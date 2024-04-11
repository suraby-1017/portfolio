@extends('layouts.app')
@section('content')

<h1>新規投稿</h1>

<form method="POST" action="{{ route('timeline.store') }}" enctype="multipart/form-data">
@csrf


<div>
    <label for="form-title">タイトル</label>
    <input type="text" name="title" id="form-title" required>
</div>

<div>
    <label for="form-description">内容</label>
    <input type="text" name="description" id="form-description">
</div>

<div>
    <label for="form-image_path">画像</label>
    <input type="file" name="image_path" id="form-image_path">
</div>

<button type="submit">投稿</button>


<a href="{{ route('timeline.index') }}">{{ __('投稿一覧へ戻る') }}</a>

</form>


@endsection