@extends('layouts.app')
@section('content')


<h1>詳細表示</h1>

  <div>
  メニュー名
  {{$coffee->name}}
  </div>

  <div>
  ベース
  {{$coffee->base}}
  </div>

  <div>
  作り方
  {{$coffee->material}}
  </div>

  <div>
  コメント
  {{$coffee->comment}}
  </div>

  <div>
  画像
  {{$coffee->image}}
  </div>

  <div>
  甘さ
  {{$coffee->sweetness_level}}
  </div>

  <div>
  苦さ
  {{$coffee->bitterness_level}}
  </div>

<a href="{{ route('coffee.index') }}">{{ __('一覧に戻る') }}</a>


<a href="{{route('coffee.edit',['id'=>$coffee->id])}}">{{ __('編集') }}</a>


<form method="POST" action="{{route('coffee.destroy',['id'=>$coffee->id])}}">
  @csrf
  <button type="submit">削除</button>
</form>



@endsection