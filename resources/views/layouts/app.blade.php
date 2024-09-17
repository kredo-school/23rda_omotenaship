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
    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        // 'resources/sass/app.scss',
    ])

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap 5 CSS -->
    {{-- <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet"> --}}

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post-index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/posts-show.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post-create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/posts-select-category.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profiles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/direct-messages.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components-footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components-post.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components-calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components-category-buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">

    {{-- mapbox --}}
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.6.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.6.0/mapbox-gl.js"></script>
</head>

<body>
    <div class="wrap">
        <!-- Include the navbar here-->
        @include('components.navbar')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Include the footer here-->
        @include('components.footer')
    </div>

    {{-- Bootstrap 5 JS --}}
    {{-- <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script> --}}

    {{-- jQuery --}}
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>

    {{-- Custum JS --}}
    @stack('script')
</body>

</html>
