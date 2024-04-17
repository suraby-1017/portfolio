@extends('layouts.app')
@section('content')

<title>プロフィール</title>

<h1>現在あなたは{{\Illuminate\Support\Facades\Auth::user()->name}}でログインしています。</h1>
    @foreach($posts as $posts)
    <div>
        <a href="{{route('timeline.show',['id'=>$posts->id])}}">
        {{ $posts->user_id }}
        {{ $posts->title }}
    </div>
    <div>
        <img src="{{ Storage::url($posts->image_path) }}" width="150" alt='image_path'>
    </div>
    @endforeach

    <div>
        <a href="{{ route('coffee.index') }}">{{ __('メニュー 一覧へ戻る') }}</a>
    </div>
    <div>
        <a href="{{ route('timeline.index') }}">{{ __('投稿 一覧に戻る') }}</a>
    </div>
    <div class="card-body">
        <a href="{{ route('home') }}">home</a>
    </div>
@endsection