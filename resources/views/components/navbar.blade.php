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
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route($route_from_logo) }}">
            {{-- Logo --}}
            <img src="{{ asset($logo_url) }}" alt="logo" width="60" height="60"
                class="d-inline-block align-text-top">

            {{-- Servise Name --}}
            <h1>Omotenaship</h1>
        </a>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @if (!request()->is('login') && !request()->is('register'))
                @if (!Auth::check() || Auth::user()->role_id !== 1)
                    {{-- Search bar --}}
                    <form action="{{ route('posts.index') }}" method="get" class="search me-20 pt-3">

                        <input type="search" name="search" value="{{ isset($search) ? old('search',$search) : ''}}" id="search" class="form-control" placeholder="search">
                    </form>

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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.create') }}">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                        </li>

                        {{-- Favorite --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('favorites.index') }}">
                                <i class="fa-regular fa-star"></i>
                            </a>
                        </li>

                        {{-- Direct Message --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/chatify') }}">
                                <i class="fa-regular fa-comments"></i>
                            </a>
                        </li>

                        {{-- Browsing History --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('browsing-history.index') }}">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                            </a>
                        </li>

                        {{-- Profile --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profiles.show') }}">
                                <i class="fa-solid fa-circle-user"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Logout --}}
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit" class="nav-link">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                </a>
                        </form>
                    </li>
                @endif
            @endif
        </ul>
    </div>
</nav>