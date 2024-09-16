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
                    <div id="all-posts-container" class="">
                        @forelse ($all_posts as $post)
                            <div class="post-container me-1">
                                @include('components.post')
                            </div>
                        @empty
                            No posts yet!
                        @endforelse

                        {{-- Pagination Link --}}
                        {{-- <div class="d-flex justify-content-center">
                            {{ $all_posts->links() }}
                        </div> --}}
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

                        {{-- Pagination Link --}}
                        <div class="d-flex justify-content-center">
                            {{ $searched_posts->links() }}
                        </div>
                    </div>
                @endif

                {{-- Posts with each category --}}
                @if (request()->has('category'))
                    {{-- Recommended --}}
                    <h3 class="fs-4 mb-3">
                        <span class="px-2 heading-kurenai">Recommended</span>
                    </h3>
                    <div class="row">
                        @forelse ($recommended_posts as $post)
                            <div class="col-lg-6 mb-3">
                                @include('components.post')
                            </div>
                        @empty
                            No posts yet!
                        @endforelse

                        {{-- Pagination Link --}}
                        <div class="d-flex justify-content-center">
                            @if (strtolower(request()->category) == 'event' || strtolower(request()->category) == 'volunteer')
                                {{ $recommended_posts->appends([
                                        'upcoming-posts-page' => $upcoming_posts->currentPage(),
                                        'ended-posts-page' => $ended_posts->currentPage(),
                                    ])->links() }}
                            @elseif (strtolower(request()->category) == 'review' || strtolower(request()->category) == 'culture')
                                {{ $recommended_posts->appends([
                                        'latest-posts-page' => $latest_posts->currentPage(),
                                    ])->links() }}
                            @endif
                        </div>
                    </div>
                @endif

                {{-- Posts with category Event/Volunteer --}}
                @if (strtolower(request()->category) == 'event' || strtolower(request()->category) == 'volunteer')
                    {{-- Upcoming --}}
                    <h3 class="fs-4 mb-3">
                        <span class="px-2 heading-kurenai">Upcoming</span>
                    </h3>
                    <div class="row">
                        @forelse ($upcoming_posts as $post)
                            <div class="col-lg-6 mb-3">
                                @include('components.post')
                            </div>
                        @empty
                            No posts yet!
                        @endforelse

                        {{-- Pagination Link --}}
                        <div class="d-flex justify-content-center">
                            {{ $upcoming_posts->appends([
                                    'recommended-posts-page' => $upcoming_posts->currentPage(),
                                    'ended-posts-page' => $ended_posts->currentPage(),
                                ])->links() }}
                        </div>
                    </div>

                    {{-- Ended --}}
                    <h3 class="fs-4 mb-3">
                        <span class="px-2 heading-kurenai">Ended</span>
                    </h3>
                    <div class="row">
                        @forelse ($ended_posts as $post)
                            <div class="col-lg-6 mb-3">
                                @include('components.post')
                            </div>
                        @empty
                            No posts yet!
                        @endforelse

                        {{-- Pagination Link --}}
                        <div class="d-flex justify-content-center">
                            {{ $ended_posts->appends([
                                    'recommended-posts-page' => $upcoming_posts->currentPage(),
                                    'upcoming-posts-page' => $ended_posts->currentPage(),
                                ])->links() }}
                        </div>
                    </div>
                @endif

                {{-- Posts with category Review/Culture --}}
                @if (strtolower(request()->category) == 'review' || strtolower(request()->category) == 'culture')
                    {{-- Latest --}}
                    <h3 class="fs-4 mb-3">
                        <span class="px-2 heading-kurenai">Latest</span>
                    </h3>
                    <div class="row">
                        @forelse ($latest_posts as $post)
                            <div class="col-lg-6 mb-3">
                                @include('components.post')
                            </div>
                        @empty
                            No posts yet!
                        @endforelse

                        {{-- Pagination Link --}}
                        <div class="d-flex justify-content-center">
                            {{-- {{ $latest_posts->links() }} --}}
                            {{ $latest_posts->appends([
                                    'recommended-posts-page' => $recommended_posts->currentPage(),
                                ])->links() }}
                        </div>
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
