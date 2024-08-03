@extends('layouts.app')

@section('title', 'Omotenaship')

@section('content')
    <div class="container-fluid mb-5">
        <img src="{{ asset('images/banners/navbar-before-login.png') }}" alt="">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="row mb-5">
                    <div class="col">
                        {{-- Event near You --}}
                        <img src="{{ asset('images/banners/event-near-you.png') }}" alt="">
                    </div>
                </div>

                <h2 class="border">New Post</h2>

                <div class="row">
                    <div class="col-6">
                        <img src="{{ asset('images/posts/post-1.png') }}" alt="">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('images/posts/post-2.png') }}" alt="">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('images/posts/post-3.png') }}" alt="">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('images/posts/post-1.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="col-4">
                 {{-- Sidebar --}}
                 <img src="{{ asset('images/banners/sidebar.png') }}" alt="">
            </div>
        </div>

        <div class="row">
            Footer
        </div>
    </div>
@endsection
