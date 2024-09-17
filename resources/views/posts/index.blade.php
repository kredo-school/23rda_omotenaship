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
                @php
                    // Set the heading text
                    $heading_text = 'New Post';
                    if (request()->has('category')) {
                        $heading_text = 'Category: ' . ucfirst(request()->category);
                    } elseif (request()->has('search')) {
                        $heading_text = 'Search: ' . request()->search;
                    }
                @endphp
                <h2 class="fs-3 mb-3"><span class="px-2 heading-kurenai">{{ $heading_text }}</span></h2>

                {{-- Posts --}}
                {{-- All posts --}}
                @if (!request()->has('category') && !request()->has('search'))
                    <div id="all-posts-container" class="posts-container" data-page-name="all-posts-page">
                        @forelse ($all_posts as $post)
                            <div class="post-container me-1">
                                @include('components.post')
                            </div>
                        @empty
                            No posts yet!
                        @endforelse
                    </div>
                @endif

                {{-- Searched posts --}}
                @if (request()->has('search'))
                    <div class="row">
                        @forelse ($searched_posts as $post)
                            <div class="col-lg-6 mb-3">
                                @include('components.post')
                            </div>
                        @empty
                            No posts yet!
                        @endforelse
                    </div>
                @endif

                {{-- Posts with each category --}}
                @if (request()->has('category'))
                    {{-- Recommended --}}
                    <h3 class="fs-4 mb-3">
                        <span class="px-2 heading-kurenai">Recommended</span>
                    </h3>
                    <div id="recommended-posts-container" class="mb-4 posts-container"
                        data-page-name="recommended-posts-page">
                        @forelse ($recommended_posts as $post)
                            <div class="post-container me-1">
                                @include('components.post')
                            </div>
                        @empty
                            No posts yet!
                        @endforelse
                    </div>
                @endif

                {{-- Posts with category Event/Volunteer --}}
                @if (request()->category === 'event' || request()->category === 'volunteer')
                    {{-- Upcoming --}}
                    <h3 class="fs-4 mb-3">
                        <span class="px-2 heading-kurenai">Upcoming</span>
                    </h3>
                    <div id="upcoming-posts-container" class="mb-4 posts-container" data-page-name="upcoming-posts-page">
                        @forelse ($upcoming_posts as $post)
                            <div class="post-container me-1">
                                @include('components.post')
                            </div>
                        @empty
                            No posts yet!
                        @endforelse
                    </div>

                    {{-- Ended --}}
                    <h3 class="fs-4 mb-3">
                        <span class="px-2 heading-kurenai">Ended</span>
                    </h3>
                    <div id="ended-posts-container" class="mb-4 posts-container" data-page-name="ended-posts-page">
                        @forelse ($ended_posts as $post)
                            <div class="post-container me-1">
                                @include('components.post')
                            </div>
                        @empty
                            No posts yet!
                        @endforelse
                    </div>
                @endif


                {{-- Posts with category Review/Culture --}}
                @if (request()->category === 'review' || request()->category === 'culture')
                    {{-- Latest --}}
                    <h3 class="fs-4 mb-3">
                        <span class="px-2 heading-kurenai">Latest</span>
                    </h3>
                    <div id="latest-posts-container" class="mb-4 posts-container" data-page-name="latest-posts-page">
                        @forelse ($latest_posts as $post)
                            <div class="post-container me-1">
                                @include('components.post')
                            </div>
                        @empty
                            No posts yet!
                        @endforelse

                    </div>
                @endif
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

@push('script')
    @vite(['resources/js/pages/posts/index.js'])
@endpush
