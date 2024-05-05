@extends('layouts.app')
@section('content')

<div class="container mt-5">
  <h1 class="text-center">一覧画面</h1>

  <!-- 検索フォーム -->
  <div class="row justify-content-center mb-3">
    <div class="col-sm-6">
      <form action="{{ route('coffee.index') }}" method="GET" class="form-inline justify-content-center">
        <div class="input-group">
          <input type="text" name="keyword" value="{{ $keyword }}" class="form-control mr-sm-2">
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">検索</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <h2 class="text-center coffee-menu mb-4">
    <span>Coffee Menu</span>
    <a href="{{ route('coffee.create') }}" class="btn btn-success ml-2">新規作成</a>
    <a href="{{ route('timeline.index') }}" class="btn btn-info ml-2">投稿一覧</a>
  </h2>

  <!-- メニューテーブル -->
  <div class="row">
    @forelse ($posts as $post)
    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $post->name }}</h5>
          <p class="card-text">ベース: {{ $post->base }}</p>
          <a href="{{ route('coffee.show',['id'=>$post->id]) }}" class="btn btn-primary">詳細</a>
        </div>
      </div>
    </div>
    @empty
    <div class="col-md-12">
      <p>No posts!!</p>
    </div>
    @endforelse
  </div>

<!-- ページネーションリンク -->
<div class="row justify-content-center mt-3">
  <div class="col-md-2">
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center">
        {{ $posts->links('pagination::bootstrap-5') }} <!-- Bootstrap 5のページネーションスタイルを適用 -->
      </ul>
    </nav>
  </div>
</div>


@endsection
