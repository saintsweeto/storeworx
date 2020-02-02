<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="/favicon.ico"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Theme Styles -->
    <link rel="stylesheet" href="/dashkit/src/assets/css/theme.css">

    <!-- Theme Plugins -->
    <link rel="stylesheet" href="/dashkit/src/assets/fonts/feather/feather.css">
    @yield('plugins')
</head>
<body>
    @yield('content')
    @yield('scripts')
</body>
</html>
