@extends('layouts.app')

@section('title', 'Omotenaship')

@section('content')
    <div class="container mt-5">
        <div class="row">
            {{-- Left Column --}}
            <div class="col-xl-8 mb-5">
                {{-- Event near You --}}
                @if (!request()->has('category') && !request()->has('search'))
                    <div class="mb-5">
                        <a href="{{ route('posts.show-event-near-you') }}" class="d-block w-100">
                            <div class="event-near-you image-container w-100">
                                <img src="{{ asset('images/banners/map_japan.png') }}" alt="Event near You" class="img-fluid">
                                <h2 class="h1 display-4 text-center fw-bold w-100 m-0 text-overlay">Event near You</h2>
                            </div>
                        </a>
                    </div>
                @endif

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
            <div class="col-xl-4 mb-5">
                <div class="row">
                    <div class="col-md-6 col-xl-12 mb-5">
                        {{-- Calendar --}}
                        @include('components.calendar')
                    </div>

                    <div class="col-md-6 col-xl-12 mb-5">
                        {{-- Categories --}}
                        @include('components.category-buttons')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
