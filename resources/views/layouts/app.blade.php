<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'R Corp - Employee Management') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        *{
            font-family: 'Open Sans', sans-serif;
        }

        .company-name{
            font-weight: bold;
        }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
</head>
<body class="bg-primary">
    <div id="app">
        @yield('content')
        <div class="row mb-2">
            <small class="m-auto">Copyright &copy; 2021. All rights reserved.</small>
        </div>
    </div>
</body>
</html>
