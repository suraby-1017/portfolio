@extends('layouts.app')
@section('content')


<div class="container mt-5">
<h1>詳細表示</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">メニュー名: {{$coffee->name}}</h5>
        <p class="card-text">ベース: {{$coffee->base}}</p>
        <p class="card-text">作り方: {{$coffee->material}}</p>
        <p class="card-text">コメント: {{$coffee->comment}}</p>
        <img src="{{ asset('storage/' . $coffee->image) }}" class="card-img-top" alt="coffee-image" style="width: 150px;">
        <p class="card-text">甘さ: {{$coffee->sweetness_level}}</p>
        <p class="card-text">苦さ: {{$coffee->bitterness_level}}</p>
    </div>
</div>

<a href="{{ route('coffee.index') }}" class="btn btn-primary mt-3">{{ __('一覧に戻る') }}</a>
<a href="{{route('coffee.edit',['id'=>$coffee->id])}}" class="btn btn-secondary mt-3">{{ __('編集') }}</a>

<form method="POST" action="{{route('coffee.destroy',['id'=>$coffee->id])}}" class="mt-3">
    @csrf
    <button type="submit" class="btn btn-danger">{{ __('削除') }}</button>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



@endsection