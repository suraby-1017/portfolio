@extends('layouts.app')
@section('content')
<h1>一覧画面</h1>
@foreach ($items as $item)
    <img src="{{ Storage::url($item->img) }}" width="25%">
@endforeach
@endsection