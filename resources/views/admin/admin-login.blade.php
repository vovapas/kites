<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}"  />
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
    <title>Вход в панель управления</title>
</head>

<body class="login-page">

    <img style="width: 200px; margin: 10px 0 0 10px" src="{{ asset('images/logo.png') }}" alt="">


    <div class="alert-error">
        <h2>
            @if(session('error'))
                {{ session('error') }}
            @endif
        </h2>
    </div>

    <div class="wrapper">
        <div class="container">
            <h1>Панель управления</h1>

            <form action="{{ URL::to('admin/login') }}" method="post" class="form" accept-charset="utf-8" role="form" >
                {!! csrf_field() !!}
                <div style="position: relative">
                    <i class="fa fa-envelope-o icon-input"></i>
                    <input name="email" type="text" placeholder="Email" required>
                </div>

                <div style="position: relative">
                    <i class="fa fa-key icon-input"></i>
                    <input name="password" type="password" placeholder="Пароль" required>
                </div>

                <button type="submit" id="login-button">Войти</button>
            </form>
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</body>
</html>