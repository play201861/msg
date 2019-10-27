<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    @include('component.navbar')

    <main class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @yield('content')
            </div>
        </div>
    </main>

    @if (config('app.debug'))
    @include('sudosu::user-selector')
    @endif

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    @include('component.notice')
</body>

</html>
