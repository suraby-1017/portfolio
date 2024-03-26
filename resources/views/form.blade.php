@extends('layouts.app')
@section('content')
{{-- DBに画像を紐づけて保存する --}}
<form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <input type="submit" value="アップロード">
    </form>
@endsection
