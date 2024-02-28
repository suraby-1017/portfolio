<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bladeファイルにBootstrap適用 js.css--}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>Document</title>
</head>
<body>
    <form>
        <h1><img src="img/account-icon.png" alt="ログイン"/></h1>
        <p><input type="email" placeholder="メールアドレス" required autofocus></p>
        <p><input type="password" placeholder="パスワード" required></p>
        <p><a href="#">パスワードをお忘れの場合</a></p>
        <p><button type="submit">ログイン</button></p>
        </form>
</body>
</html>
<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
</div>
