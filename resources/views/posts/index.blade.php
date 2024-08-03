@extends('layouts.app')

@section('title', 'Omotenaship')

@section('content')
    @include('components.navbar')

    <div class="container mt-5">
        <div class="row">
            <div class="col-8">
                <div class="row mb-5">
                    <div class="col">
                        {{-- Event near You --}}
                        <img src="{{ asset('images/banners/event-near-you.png') }}" alt="">
                    </div>
                </div>

                {{-- Heading --}}
                <h2 class="mb-3"><span class="px-2 heading-kurenai">New Post</span></h2>

                {{-- Posts --}}
                <div class="row">
                    <div class="col-6 mb-3">
                        @include('components.post')
                    </div>
                    <div class="col-6 mb-3">
                        @include('components.post')
                    </div>
                    <div class="col-6 mb-3">
                        @include('components.post')
                    </div>
                    <div class="col-6 mb-3">
                        @include('components.post')
                    </div>
                </div>
            </div>

            <div class="col-4">
                {{-- Sidebar --}}
                @include('components.sidebar')
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('components.footer')
@endsection
