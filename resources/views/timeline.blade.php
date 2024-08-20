@extends('layouts.app')
@section('content')
    <div class="container mt-5">

        <div class="wrapper">
            <h1>投稿してみよう！
                <a href="{{ route('timeline.create') }}" class="btn btn-primary">{{ __('投稿') }}</a>
            </h1>
        </div>

        <div class="posting-wrapper">
            @foreach ($posting as $post)
                <div class="card posting-item">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <img src="{{ Storage::url($post->image_path) }}" class="card-img-top" style="max-width: 150px;"
                            alt="image_path">
                        <a href="{{ route('timeline.show', ['id' => $post->id]) }}"
                            class="btn btn-primary mt-2">{{ __('詳細を見る') }}</a>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('coffee.index') }}" class="btn btn-secondary">{{ __('一覧へ戻る') }}</a>
        <a href="{{ route('profile.show') }}" class="btn btn-secondary">{{ __('My プロフィール') }}</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
