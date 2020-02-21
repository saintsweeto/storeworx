<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="/favicon.ico"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StoreWorx') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Theme Styles -->
    <link rel="stylesheet" href="/dashkit/src/assets/css/theme.css">

    <!-- Theme Plugins -->
    <link rel="stylesheet" href="/dashkit/src/assets/fonts/feather/feather.css">
</head>
<body class="d-flex align-items-center bg-auth border-top border-top-2 border-warning">
<div class="container">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">
            <div class="text-center">
                <img src="/img/lost-new.svg" alt="lost-img" class="img-fluid">
            </div>
        </div>
        <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

            <div class="text-center">
                <h6 class="text-uppercase text-muted mb-4">404 error</h6>
                <h1 class="display-4 mb-3">Page not found</h1>
                <p class="text-muted mb-4">Looks like you ended up here by accident?</p>
                <a href="/home" class="btn btn-lg btn-warning">
                    Return to your dashboard
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
