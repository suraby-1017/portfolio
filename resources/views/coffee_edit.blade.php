@extends('layouts.app')
@section('content')

<h1>編集</h1>

<form method="POST" action="{{route('coffee.update',['id' =>$coffee->id])}}" enctype="multipart/form-data">
@csrf

<div>
メニュー名
<input type="text" name=name value="{{$coffee->name}}">
</div>

<div>
ベース
<input type="text" name=base value="{{$coffee->base}}">
</div>

<div>
作り方
<input type="text" name=material value="{{$coffee->material}}">
</div>

<div>
コメント
<input type="text" name=comment value="{{$coffee->comment}}">
</div>

<div>
画像
{{-- <input type="text" name=image value="{{$coffee->image}}"> --}}
<img src=" {{ asset('storage/' . $coffee->image) }} " width="150" alt="coffee-image">
<input type="file" name="image" id="form-image">
</div>

<div>
甘さ
<input type="text" name=sweetness_level value="{{$coffee->sweetness_level}}">
</div>

<div>
苦さ
<input type="text" name=bitterness_level value="{{$coffee->bitterness_level}}">
</div>


<input type="submit" value="更新する">



<a href="{{route('coffee.show',['id'=>$coffee->id])}}">{{ __('詳細に戻る') }}</a>



</form>


@endsection