<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>一覧画面</title>
</head>
<body>
  <h1>一覧画面</h1>
  {{-- 検索機能ここから --}}
  <div>
    <form action="{{ route('coffee.index') }}" method="GET">
      <input type="text" name="keyword" value="{{ $keyword }}">
      <input type="submit" value="検索">
    </form>
  </div>
  {{-- 検索機能ここまで --}}

  <h1>
    <span>Coffee Menu</span>
    <a href="{{ route('coffee.create') }}">{{ __('新規作成') }}</a>
    <a href="{{ route('timeline.index') }}">{{ __('投稿一覧') }}</a>
  </h1>

  <table>
    <tr>
      <th>メニュー名</th>
      <th>ベース</th>
      <th></th>
    </tr>

  {{-- 保存されているレコードを一覧表示 --}}
    @forelse ($posts as $post)
      <tr>
        <td>
          {{-- 「http:(ドメイン)/coffee/{id}」 へアクセスするリンクを作る --}}
          {{-- <a href="coffee/show/{{ $post->id }}"> --}}
            <a href="{{route('coffee.show',['id'=>$post->id])}}">
            {{ $post->name }}
          </a>
        </td>
        <td>{{ $post->base }}</td>
        </td>
      </tr>
    @empty
      <td>No posts!!</td>
    @endforelse
  </table>

</body>
</html>