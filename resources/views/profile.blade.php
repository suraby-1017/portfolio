<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>プロフィール</title>
</head>
<body>
    現在あなたは{{\Illuminate\Support\Facades\Auth::user()->name}}でログインしています。

    <div class="card-body">
        <a href="{{ route('home') }}">home</a>
    </div>
</body>
</html>