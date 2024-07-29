@if (false)
<!-- Admin navbar -->
<nav class="navbar admin-navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logos/blue.jpg') }}" alt="logo" width="60" height="60" class="d-inline-block align-text-top">
        </a>
        <h1>Omotenaship</h1>

        
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-circle-user"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </li>
        </ul>        
    </div>
</nav>

@elseif (false)
<!--Guest navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logos/red.jpg') }}" alt="logo" width="60" height="60" class="d-inline-block align-text-top">
        </a>
        <h1>Omotenaship</h1>

        
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <form action="#" class="search me-2 pt-3">
                <input type="search" name="search" id="search" class="form-control" placeholder="search">
            </form>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </li>
        </ul>        
    </div>
</nav>

@elseif (true)
<!--User navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logos/red.jpg') }}" alt="logo" width="60" height="60" class="d-inline-block align-text-top">
        </a>
        <h1>Omotenaship</h1>
        
        <ul class="navbar-nav ms-auto mb-4 mb-lg-0">
            <form action="#" class="search me-20 pt-3">
                <input type="search" name="search" id="search" class="form-control" placeholder="search">
            </form>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-regular fa-star"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-regular fa-comments"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-regular fa-address-card"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-circle-user"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </li>
        </ul>        
    </div>
</nav>

@elseif (false)
<!--Register navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logos/red.jpg') }}" alt="logo" width="60" height="60" class="d-inline-block align-text-top">
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