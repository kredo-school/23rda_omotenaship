@guest
    <!--Guest navbar -->
    <nav class="navbar user-navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logos/red.jpg') }}" alt="logo" width="60" height="60"
                    class="d-inline-block align-text-top">
            </a>
            <h1>Omotenaship</h1>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <form action="#" class="search me-2 pt-3">
                    <input type="search" name="search" id="search" class="form-control" placeholder="search">
                </form>

                <li class="nav-item">
                    {{-- Login --}}
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@endguest

@auth
    @if (Auth::user()->role_id === 1)
        {{-- @if (request()->is('/admin/*')) --}}
        <!-- Admin navbar -->
        <nav class="navbar admin-navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logos/blue.jpg') }}" alt="logo" width="60" height="60"
                        class="d-inline-block align-text-top">
                </a>
                <h1>Omotenaship</h1>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-circle-user"></i>
                        </a>
                    </li>

                    {{-- Logout --}}
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit" class="nav-link">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                </a>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    @elseif(Auth::user()->role_id === 2)
        <!--User navbar -->
        <nav class="navbar user-navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logos/red.jpg') }}" alt="logo" width="60" height="60"
                        class="d-inline-block align-text-top">
                </a>
                <h1>Omotenaship</h1>

                <ul class="navbar-nav ms-auto mb-4 mb-lg-0">
                    {{-- Serch bar  --}}
                    
                        @if (!request()->is('admin/*'))
                            <form action="{{ route('posts.search') }}" class="search me-20 pt-3">
                                <input type="search" name="search" id="search" class="form-control" placeholder="search">
                            </form>
                        @endif
                    
                    {{-- Create Post --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.create') }}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </li>

                    {{-- Favorite --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-star"></i>
                        </a>
                    </li>

                    {{-- Direct Message --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-comments"></i>
                        </a>
                    </li>

                    {{-- Browsing History --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </a>
                    </li>

                    {{-- Profile --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profiles.show') }}">
                            <i class="fa-solid fa-circle-user"></i>
                        </a>
                    </li>

                    {{-- Logout --}}
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit" class="nav-link">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                </a>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    @endif
@endauth

@if (false)
    <!--Register navbar -->
    {{-- Only for login and register page --}}
    <nav class="navbar user-navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logos/red.jpg') }}" alt="logo" width="60" height="60"
                    class="d-inline-block align-text-top">
            </a>
            <h1>Omotenaship</h1>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <h6>Login</h6>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <h6>Register</h6>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@endif
