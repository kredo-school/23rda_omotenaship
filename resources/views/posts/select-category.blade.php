@php
    $logo_url = 'images/logos/red.jpg';
    $logo_blue_url = 'images/logos/blue.jpg';
@endphp

@extends('layouts.app')

@section('title', 'New Post')

@section('content')
    <div class="container mt-5">
        <div class="row">
            {{-- Left Column --}}
            <div class="offset-lg-3 col-lg-6 mb-5">
                {{-- Header --}}
                <h2 class="text-center m-0 mb-5">
                    <span class="px-2 heading-kurenai">What do you want to share?</span>
                </h2>

                {{-- User selecton --}}
                <div class="border rounded mb-3 p-3">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            {{-- Icon --}}
                            <div class="d-flex justify-content-center align-items-center position-relative custom-logo-container">
                                <img src="{{ asset($logo_url) }}" alt="logo" class="custom-logo">
                                <span class="overlay-text">user</span>
                            </div>
                        </div>

                        {{-- User category contener --}}
                        <div class="col-md-9 col-lg-9">
                            <div class="row h-100">
                                {{-- Event --}}
                                <div class="col-6 col-md-3 col-lg-3">
                                    <label for="event" class="icon-position">Event</label>
                                    <a href="{{ route('posts.create', ['category_id' => 2]) }}"
                                        class="d-flex justify-content-center align-items-center user-color custom-icon-container">
                                        <img src="{{ asset('images/categories/2.png') }}">
                                    </a>
                                </div>

                                {{-- Volunteer --}}
                                <div class="col-6 col-md-3 col-lg-3">
                                    <label for="volunteer" class="icon-position">Volunteer</label>
                                    <a href="{{ route('posts.create', ['category_id' => 3]) }}"
                                        class="d-flex justify-content-center align-items-center user-color">
                                        <img src="{{ asset('images/categories/1.png') }}">
                                    </a>
                                </div>

                                {{-- Review --}}
                                <div class="col-6 col-md-3 col-lg-3">
                                    <label for="review" class="icon-position">Review</label>
                                    <a href="{{ route('posts.create', ['category_id' => 1]) }}"
                                        class="d-flex justify-content-center align-items-center user-color">
                                        <img src="{{ asset('images/categories/3.png') }}">
                                    </a>
                                </div>

                                {{-- Culture --}}
                                <div class="col-6 col-md-3 col-lg-3">
                                    <label for="culture" class="icon-position">Culture</label>
                                    <a href="{{ route('posts.create', ['category_id' => 4]) }}"
                                        class="d-flex justify-content-center align-items-center user-color">
                                        <img src="{{ asset('images/categories/4.png') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Organizer selecton --}}
                <div class="border rounded p-3">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            {{-- Icon --}}
                            <div class="d-flex justify-content-center align-items-center position-relative custom-logo-container">
                                <img src="{{ asset($logo_blue_url) }}" alt="logo" class="logo-organizer">
                                <span class="overlay-text">Organizer</span>
                            </div>
                        </div>

                        <div class="col-md-9 col-lg-9">
                            <div class="row h-100">
                                {{-- Event --}}
                                <div class="col-6 col-md-3 col-lg-3">
                                    <label for="event" class="icon-position icon-organizer">Event</label>
                                    <a href="{{ route('posts.create', ['category_id' => 5]) }}"
                                        class="d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('images/categories/2.png') }}">
                                    </a>
                                </div>

                                {{-- Volunteer --}}
                                <div class="col-6 col-md-3 col-lg-3">
                                    <label for="volunteer" class="icon-position icon-organizer">Volunteer</label>
                                    <a href="{{ route('posts.create', ['category_id' => 6]) }}"
                                        class="d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('images/categories/1.png') }}">
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
