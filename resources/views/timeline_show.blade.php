@extends('layouts.app')
@section('content')

<table>
    <tr>
    <th>タイトル</th>
    <th>内容</th>
    <th>画像</th>
    </tr>
    <tr>
        <td>{{$item->title}}</td>
        <td>{{$item->description}}</td>
        <td><img src="{{ Storage::url($item->image_path) }}" width="150" alt='post_image'></td>
    </tr>
</table>

<a href="{{ route('profile.show') }}">{{ __('My プロフィール') }}</a>

<a href="{{route('timeline.edit',['id'=>$item->id])}}">{{ __('編集') }}</a>

<form method="POST" action="{{route('timeline.destroy',['id'=>$item->id])}}">
    @csrf
    <button type="submit">削除</button>
</form>

@endsection