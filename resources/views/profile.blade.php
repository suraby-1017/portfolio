@extends('layouts.app')
@section('content')

    <body>
        <div class="container">
            <h1 class="mt-5">ようこそ {{ \Illuminate\Support\Facades\Auth::user()->name }}さん。</h1>
            @foreach ($posts as $post)
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title"><a
                                href="{{ route('timeline.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h5>
                        {{-- <p class="card-text">{{ $post->user_id }}</p> --}}
                        <img src="{{ Storage::url($post->image_path) }}" class="img-fluid"
                            style="max-width: 300px; height: auto;" alt="image_path"> <!-- img-fluidクラスを追加し、style属性で幅を設定 -->
                    </div>
                </div>
            @endforeach

            <div class="mt-3">
                <a href="{{ route('coffee.index') }}" class="btn btn-primary">{{ __('メニュー 一覧へ戻る') }}</a>
                <a href="{{ route('timeline.index') }}" class="btn btn-primary">{{ __('投稿 一覧に戻る') }}</a>
                <a href="{{ route('home') }}" class="btn btn-primary">home</a>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection
