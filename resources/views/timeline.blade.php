@extends('layouts.app')
@section('content')


<title>SNSを作ってみよう!</title>
<div class="wrapper" style="margin: 0 auto; width: 50%; height: 100%; background-color: white;">
            <p>投稿してみよう！
                <a href="{{ route('timeline.create') }}">{{ __('投稿') }}</a>
            </p>
        </div>
    </form>
    <div class="posting-wrapper">
        @foreach($posting as $posting)
        <div>
            <div>
                {{-- 「http:(ドメイン)/timeline/{id}」 へアクセスするリンクを作る --}}
                <a href="{{route('timeline.show',['id'=>$posting->id])}}">
                {{ $posting->title }}</div>
                </a>
            <div>
                <img src="{{ Storage::url($posting->image_path) }}" width="150" alt='post_image'>
            </div>
        </div>
        @endforeach
    </div>
</div>

<a href="{{ route('coffee.index') }}">{{ __('一覧へ戻る') }}</a>


@endsection