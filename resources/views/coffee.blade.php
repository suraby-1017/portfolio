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
    {{-- <a href="{{ route('posts.create') }}">[Add]</a> --}}
  </h1>

  <table>
    <tr>
      <th>メニュー名</th><th>ベース</th><th>甘さ</th><th>苦さ</th>
    </tr>

  {{-- 保存されているレコードを一覧表示 --}}
  <form action="">
    @forelse ($posts as $post)
      <tr>
        <td>{{ $post->name }}</td>
        <td>{{ $post->base }}</td>
        <td>{{ $post->sweetness_level }}</td>
        <td>{{ $post->bitterness_level }}</td>
        <td><button type="submit">edit</button></td>
      </tr>
    @empty
      <td>No posts!!</td>
    @endforelse
  </form>
  </table>

</body>
</html>