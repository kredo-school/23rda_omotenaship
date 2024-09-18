@php
    $footer_color = 'footer-color-user';

    if (Auth::check() && Auth::user()->role_id === 1) {
        $footer_color = 'footer-color-admin';
    }
@endphp

<div class="footer">
    <div class="container-fluid footer-container {{ $footer_color }}">
        <div class=snslinks>
            <a href="#" class="text-white text-decoration-none">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="#" class="text-white text-decoration-none">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="#" class="text-white text-decoration-none">
                <i class="fa-brands fa-x-twitter"></i>
            </a>
        </div>

        <div class="text-white">
            <h6 class="m-0">©︎2024 Omotenaship</h6>
        </div>

        <div class="d-flex">
            <a href="{{ route('posts.about') }}" class="text-white text-decoration-none">
                <h6 class="m-0">About</h6>
            </a>
            <a href="{{ route('posts.contact') }}" class="text-white text-decoration-none">
                <h6 class="m-0 ms-3">Contact</h6>
            </a>
        </div>
    </div>
</div>
