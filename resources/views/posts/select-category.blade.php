@php
    $logo_url = 'images/logos/red.jpg';
@endphp

@extends('layouts.app')

@section('title', 'New Post')

@section('content')
    <div class="container mt-5">
        <div class="row">
            {{-- Left Column --}}
            <div class="offset-lg-3 col-lg-6 mb-5">
                {{-- Header --}}
                <h2 class="text-center m-0 mb-4">
                    <span class="px-2 heading-kurenai">What do you want to share?</span>
                </h2>

                {{-- User selecton --}}
                <div class="border rounded mb-3">
                    <div class="row">
                        <div class="col-lg-3">
                            {{-- Icon --}}
                            <div>
                                <img src="{{ asset($logo_url) }}" alt="logo" width="140" height="140"
                                    class="posts-logo">
                            </div>
                        </div>

                        {{-- User category contener --}}
                        <div class="col-lg-9">
                            <div class="row">
                                {{-- Event --}}
                                <div class="col-6 col-lg-3">
                                    <a href="{{ route('posts.create', ['category_id' => 2]) }}">
                                        <img src="{{ asset('images/categories/2.png') }}" class="img-fluid">
                                        <span class="hover-text">Event</span>
                                    </a>
                                </div>

                                {{-- Volunteer --}}
                                <div class="col-6 col-lg-3">
                                    <a href="{{ route('posts.create', ['category_id' => 3]) }}">
                                        <img src="{{ asset('images/categories/1.png') }}" class="img-fluid">
                                        <span class="hover-text">Volunteer</span>
                                    </a>
                                </div>

                                {{-- Review --}}
                                <div class="col-6 col-lg-3">
                                    <a href="{{ route('posts.create', ['category_id' => 1]) }}">
                                        <img src="{{ asset('images/categories/3.png') }}" class="img-fluid">
                                        <span class="hover-text">Review</span>
                                    </a>
                                </div>

                                {{-- Culture --}}
                                <div class="col-6 col-lg-3">
                                    <a href="{{ route('posts.create', ['category_id' => 4]) }}">
                                        <img src="{{ asset('images/categories/4.png') }}" class="img-fluid">
                                        <span class="hover-text">Culture</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Organizer selecton --}}
                <div class="border rounded">
                    <div class="row">
                        <div class="col-lg-3">
                            {{-- Icon --}}
                            <div>
                                <img src="{{ asset($logo_url) }}" alt="logo" width="140" height="140" class="posts-logo">
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="row">
                                {{-- Event --}}
                                <div class="col-6 col-lg-3">
                                    <a href="{{ route('posts.create', ['category_id' => 5]) }}">
                                        <img src="{{ asset('images/categories/2.png') }}" class="img-fluid">
                                        <span class="hover-text">Event</span>
                                    </a>
                                </div>

                                {{-- Volunteer --}}
                                <div class="col-6 col-lg-3">
                                    <a href="{{ route('posts.create', ['category_id' => 6]) }}">
                                        <img src="{{ asset('images/categories/1.png') }}" class="img-fluid">
                                        <span class="hover-text">Volunteer</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column --}}
            <div class="col-lg-3 mb-5">
                {{-- Information --}}
                <div>
                    {{-- Header --}}
                    <h4>Information</h4>

                    {{-- Info 1 --}}
                    <div class="mb-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit sed maxime quas at repellendus eos?
                    </div>

                    {{-- Info 2 --}}
                    <div class="mb-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit sed maxime quas at repellendus eos?
                    </div>

                    {{-- Info 3 --}}
                    <div class="mb-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit sed maxime quas at repellendus eos?
                    </div>

                    {{-- Info 4 --}}
                    <div class="mb-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit sed maxime quas at repellendus eos?
                    </div>

                    {{-- Info 5 --}}
                    <div class="mb-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit sed maxime quas at repellendus eos?
                    </div>

                    {{-- Info 6 --}}
                    <div class="mb-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit sed maxime quas at repellendus eos?
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
