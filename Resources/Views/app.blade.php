<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: #fafafa;
            font-family: sans-serif;
        }

        nav {
            background: #fff;
            padding: 20px 0;
            border-bottom: 1px solid #ccc;
            margin-bottom: 25px;
        }

        nav > .container > a {
            text-decoration: none;
            color: #000;
            transition: .2s;
        }

        nav > .container > a:hover {
            color: #ccc;
        }

        .container {
            width: 1280px;
            margin: auto;
        }

    </style>
</head>

<body>
<nav>
    <div class="container">
        <a href="/">Главная</a>
        <a href="/profile">Профиль</a>
        <a href="/profile/inventory">Инвентарь</a>
        <a href="/dungeons">Данжи</a>
        <a href="/test">test</a>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>