@extends('layouts.app')
@section('content')

<h1>編集</h1>

<form method="POST" action="{{route('timeline.update',['id' =>$item->id])}}" enctype="multipart/form-data">
@csrf

<div>
タイトル
<input type="text" name=title value="{{$item->title}}">
</div>

<div>
ベース
<input type="text" name=description value="{{$item->description}}">
</div>

<div>
画像
<img src=" {{ asset('storage/' . $item->image_path) }} " width="150" alt="post-image">
<input type="file" name="image_path" id="form-image_path">
</div>
</div>


<input type="submit" value="更新する">



<a href="{{route('timeline.show',['id'=>$item->id])}}">{{ __('詳細に戻る') }}</a>



</form>


{{-- <div class="create-items">
    <div class="form">
    <form action="/items/{{$item->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="input-form">
        <label for="title">タイトル</label>
        <input name="title" value="{{$item->title}}">
        </div>
        <div class="input-form">
        <label for="description">内容</label>
        <textarea name="description">{{$item->description}}</textarea>
        </div>
        <div class="input-form">
        <label for="image">画像</label>
        <img src=" {{ asset('storage/' . $item->image_path) }} " width="150" alt="post_image">
        <input type="file" name="image" id="form-image" value="{{$item->image}}">
        </div>
        <div class="input-form">
        <input type="submit" value="更新">
        </div>
    </form>
    <a href="{{route('timeline.show',['id'=>$item->id])}}">{{ __('詳細に戻る') }}</a>
    </div>
</div> --}}

@endsection