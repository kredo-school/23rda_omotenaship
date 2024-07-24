<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

    {{-- <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css"> --}}
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    {{-- <link rel="stylesheet" href="{{ mix('build/assets/app-CZLpMIiW.css') }}"> --}}
    <link rel="stylesheet" href="build/assets/app-CZLpMIiW.css">
</head>

<body class="font-sans antialiased">
    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="/js/app.js"></script> --}}
    {{-- <script src="{{ mix('build/assets/app-D7p3he8f.js') }}"></script> --}}
    <script src="build/assets/app-D7p3he8f.js"></script>
</body>

</html>
