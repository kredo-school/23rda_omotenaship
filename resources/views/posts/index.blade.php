@extends('layouts.app')

@section('title', 'Omotenaship')

@section('content')
    {{-- Navbar --}}
    @include('components.navbar')

    <div class="container mt-5">
        <div class="row">
            {{-- Left Column --}}
            {{-- <div class="col-md-8"> --}}
            {{-- <div class="col-lg-8"> --}}
            <div class="col-xl-8 mb-5">
                {{-- Event near You --}}
                <div class="row mb-5">
                    <div class="col event-near-you">
                        <a href="{{ route('posts.show-event-near-you') }}">
                            <img src="{{ asset('images/banners/event-near-you.png') }}" alt="" class="w-100">
                        </a>
                    </div>
                </div>

                {{-- Heading --}}
                <h2 class="mb-3"><span class="px-2 heading-kurenai">New Post</span></h2>

                {{-- Posts --}}
                <div class="row">
                    @forelse ($posts as $post)
                        <div class="col-lg-6 mb-3">
                            @include('components.post')
                        </div>
                    @empty
                        No posts yet!
                    @endforelse

                    {{-- Pagination Link --}}
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>

            {{-- Right Colmun --}}
            {{-- <div class="col-md-4"> --}}
            {{-- <div class="col-lg-4"> --}}
            <div class="col-xl-4 mb-5">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        {{-- Calendar --}}
                        @include('components.calendar')
                    </div>

                    <div class="col-md-6 col-xl-12">
                        {{-- Categories --}}
                        @include('components.category-icons')
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('components.footer')
@endsection
