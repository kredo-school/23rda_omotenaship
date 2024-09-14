@php
    $navbar_classes = 'user-navbar';
    $logo_url = 'images/logos/red.jpg';
    $route_from_logo = 'posts.index';

    if (Auth::check() && Auth::user()->role_id === 1) {
        $navbar_classes = 'admin-navbar';
        $logo_url = 'images/logos/blue.jpg';
        $route_from_logo = 'admin.users.index';
    }
@endphp

<nav class="navbar navbar-expand-lg {{ $navbar_classes }}">
    <div class="container-fluid justify-content-between">

        {{-- Toggle Button --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Brand --}}
        <a class="navbar-brand mx-auto pe-5 d-flex align-items-center" href="{{ route($route_from_logo) }}">
            {{-- Logo --}}
            <img src="{{ asset($logo_url) }}" alt="logo" width="60" height="60"
                class="d-inline-block align-text-top">

            {{-- Servise Name --}}
            {{-- <h1 class="fs-1" style="font-size: 5vw;">Omotenaship</h1> --}}
            <h1 class="brand-name">Omotenaship</h1>
        </a>

        {{-- Collapse --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (!request()->is('login') && !request()->is('register'))
                    @if (!Auth::check() || Auth::user()->role_id !== 1)
                        {{-- Search bar --}}
                        @if (Route::currentRouteName() === 'posts.index')
                            <form action="{{ route('posts.index') }}" method="get"
                                class="search d-flex align-items-center">

                                <input type="search" name="search"
                                    value="{{ isset($search) ? old('search', $search) : '' }}" id="search"
                                    class="form-control" placeholder="search">
                            </form>
                        @endif
                    @endif

                    @if (!Auth::check())
                        {{-- Login --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            </a>
                        </li>
                    @elseif (Auth::check())
                        @if (Auth::user()->role_id === 2)
                            {{-- Create Post --}}
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link d-flex align-items-center" href="{{ route('posts.select-category') }}">
                                    <i class="fa-regular fa-pen-to-square me-2"></i>
                                    <span class="nav-item-text">Create New Post</span>
                                </a>
                            </li>

                            {{-- Favorite --}}
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link d-flex align-items-center" href="{{ route('favorites.index') }}">
                                    <i class="fa-regular fa-star me-2"></i>
                                    <span class="nav-item-text">Favorite</span>
                                </a>
                            </li>

                            {{-- Direct Message --}}
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link d-flex align-items-center" href="{{ route('chatify') }}">
                                    <i class="fa-regular fa-comments me-2"></i>
                                    <span class="nav-item-text">Direct Message</span>
                                </a>
                            </li>

                            {{-- Browsing History --}}
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link d-flex align-items-center"
                                    href="{{ route('browsing-history.index') }}">
                                    <i class="fa-solid fa-clock-rotate-left me-2"></i>
                                    <span class="nav-item-text">Browsing History</span>
                                </a>
                            </li>

                            {{-- Profile --}}
                            <li class="nav-item d-flex align-items-center">
                                <a class="nav-link d-flex align-items-center"
                                    href="{{ route('profiles.show', Auth::user()->id) }}">
                                    @if (!empty(Auth::user()->profile->avatar))
                                        <img src="{{ Auth::user()->profile->avatar }}" alt=""
                                            class="rounded-circle me-2 nav-avatar">
                                    @else
                                        <i class="fa-solid fa-circle-user me-2"></i>
                                    @endif
                                    <span class="nav-item-text">Your Profile</span>
                                </a>
                            </li>
                        @endif

                        {{-- Logout --}}
                        <li class="nav-item d-flex align-items-center m-0">
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf

                                <button type="submit" class="nav-link d-flex align-items-center">
                                    <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                                    <span class="nav-item-text">Logout</span>
                                </button>
                            </form>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>
