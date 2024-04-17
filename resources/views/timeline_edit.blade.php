@extends('layouts.app')
@section('content')

<h1>編集</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{route('timeline.update',['id' =>$item->id])}}" enctype="multipart/form-data">
@csrf

<div>
タイトル
<input type="text" name=title value="{{$item->title}}">
</div>

<div>
内容
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

@endsection