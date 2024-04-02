@extends('layouts.app')
@section('content')
<h1>新規作成</h1>

<form method="POST" action="{{ route('coffee.store') }}">
@csrf


<div>
    <label for="form-name">メニュー名</label>
    <input type="text" name="name" id="form-name" required>
</div>

<div>
    <label for="form-tel">ベース</label>
    <input type="text" name="base" id="form-base">
</div>

<div>
    <label for="form-email">作り方</label>
    <input type="text" name="material" id="form-material">
</div>

<div>
    <label for="form-email">コメント</label>
    <input type="text" name="comment" id="form-comment">
</div>

<div>
    <label for="form-email">画像</label>
    <input type="text" name="image" id="form-image">
</div>

<div>
    <label for="form-email">甘さ</label>
    <input type="text" name="sweetness_level" id="form-sweetness_level">
</div>

<div>
    <label for="form-email">苦さ</label>
    <input type="text" name="bitterness_level" id="form-bitterness_level">
</div>

<button type="submit">登録</button>

{{-- 追加 --}}
<a href="{{ route('coffee.index') }}">{{ __('一覧へ戻る') }}</a>

</form>


@endsection