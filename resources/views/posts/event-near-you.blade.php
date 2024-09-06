@extends('layouts.app')

@section('title', 'Event near You')

@section('content')
    <div class="container">
        <div class="row mt-5 mb-3">
            {{-- Heading --}}
            <h2 class="mb-3"><span class="px-2 heading-kurenai">Event near You</span></h2>
        </div>

        {{-- Map --}}
        <div class="row mb-5">
            <div id="map" style="width: 100%; height: 650px;"></div>

            <script src="{{ asset('js/posts/event-near-you.js') }}"></script>
        </div>

        {{-- Posts --}}
        {{-- <div class="row">
            @forelse ($posts as $post)
                <div class="col mb-3 d-flex justify-content-center">
                    @include('components.post')
                </div>
            @empty
                No posts yet!
            @endforelse --}}

            {{-- Pagination Link --}}
            {{-- <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div> --}}
    </div>
@endsection
