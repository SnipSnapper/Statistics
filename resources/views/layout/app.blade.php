<!--resources/views/layouts/app.blade.php-->

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Hogeschool Rotterdam - Reserveringsysteem - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


        {{-- JavaScript --}}
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>-->
        <script type="text/javascript" src="/js/jquery.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>-->
        <script type="text/javascript" src="/js/moment.js"></script>  
        <script type="text/javascript" src="/js/transition.js"></script> 
        <script type="text/javascript" src="/js/collapse.js"></script>
        <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>

        {{-- CSS, Bootstrap --}}
        <link href="/css/site.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="/css/bootstrap-datetimepicker.css" rel="stylesheet"></script>

    </head>

    <body>
        @yield('content')
        @yield('scripts')
    </body>
</html>