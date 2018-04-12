<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{ !empty($seo['keywords']) ? $seo['keywords'] : '' }}" />
    <meta name="description" content="{{ !empty($seo['description']) ? $seo['description'] : '' }}" />
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}"  />
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/main.min.css') }}">

    <title> {{ $seo['title'] }} </title>
</head>

<body>
<header>
    <div class="container">
        @include('part.header')
    </div>
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<footer>
    @include('part.footer')
</footer>

<script src="{{ asset('js/main.min.js') }}"></script>

@include('meta.analytic-google')
@include('meta.analytic-yandex')
</body>
</html>