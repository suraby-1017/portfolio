<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>一覧画面</title>
</head>
<body>
  <h1>一覧画面</h1>
  <form action="index" method="GET">
    @csrf
    <input type="text" name="keyword" value="{{$keyword}}" />
    <input type="button" type="submit" value="検索" />
    <table border='2'>
      <tr>
        <th>名前</th>
        <th>ベース</th>
        <th>甘さ</th>
        <th>苦味</th>
      </tr>
      @foreach($coffee as $coffee)
        <tr>
          <td>{{$coffee->name}}</td>
          <td>{{$coffee->base}}</td>
          <td>{{$coffee->sweetness_level}}</td>
          <td>{{$coffee->bitterness_level}}</td>
        </tr>
      @endforeach
    </table>
  </form>
</body>
<style>
table {
  margin-top : 30px;
  border-collapse:collapse;
  width : 70%;
}
th {
  background-color : #C0C0C0
}
td {
  text-align : right;
}
</style>
</html>