@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        {{-- <h1>詳細表示</h1> --}}

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">タイトル</th>
                    <th scope="col">内容</th>
                    <th scope="col">画像</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td><img src="{{ Storage::url($item->image_path) }}" width="150" alt='post_image'></td>
                </tr>
            </tbody>
        </table>

        <p>※画像はイメージです</p>

        <a href="{{ route('profile.show') }}" class="btn btn-secondary">{{ __('My プロフィール') }}</a>
        <a href="{{ route('timeline.edit', ['id' => $item->id]) }}" class="btn btn-primary">{{ __('編集') }}</a>

        <form method="POST" action="{{ route('timeline.destroy', ['id' => $item->id]) }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger">{{ __('削除') }}</button>
        </form>
    </div>
@endsection
