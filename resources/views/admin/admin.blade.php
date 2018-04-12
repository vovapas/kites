<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}"  />
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/admin.min.css') }}">   

    <title>Kites.kz</title>

</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-menu " role="navigation">
        @include('admin.admin-menu')
    </nav>

    <div class="container">
        <section>
            @yield('content')           
        </section>        
    </div>    
    <script src="{{ asset('js/admin.min.js') }}"></script>  
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>  
    <script type="text/javascript">
      tinymce.init({
        selector: '#description'
      });
      </script>
</body>
</html>