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
                        <div class="col-md-4 col-lg-4">
                            {{-- Icon --}}
                            <div
                                class="d-flex justify-content-center align-items-center position-relative custom-logo-container">
                                <img src="{{ asset($logo_url) }}" alt="logo" class="custom-logo">
                                <span class="overlay-text">user</span>
                            </div>
                        </div>

                        {{-- User category contener --}}
                        <div class="col-md-8 col-lg-8">
                            <div class="row h-100">
                                {{-- Event --}}
                                <div class="col-6 col-md-3 col-lg-3">
                                    {{-- <div class="col-6 col-lg-3"> --}}
                                    <label for="event" class="icon-position">Event</label>
                                    <a href="{{ route('posts.create', ['category_id' => 2]) }}"
                                        class="d-flex justify-content-center align-items-center user-color custom-icon-user">
                                        <img src="{{ asset('images/categories/2.png') }}">
                                    </a>
                                </div>
                                {{-- Volunteer --}}
                                <div class="col-6 col-md-3 col-lg-3">
                                    {{-- <div class="col-6 col-lg-3"> --}}
                                    <label for="volunteer" class="ms-1 mb-3 mt-4">Volunteer</label>
                                    <a href="{{ route('posts.create', ['category_id' => 3]) }}"
                                        class="d-flex justify-content-center align-items-center user-color custom-icon-user">
                                        <img src="{{ asset('images/categories/1.png') }}">
                                    </a>
                                </div>

                                {{-- Review --}}
                                <div class="col-6 col-md-3 col-lg-3">
                                    {{-- <div class="col-6 col-lg-3"> --}}
                                    <label for="review" class="icon-position">Review</label>
                                    <a href="{{ route('posts.create', ['category_id' => 1]) }}"
                                        class="d-flex justify-content-center align-items-center user-color custom-icon-user">
                                        <img src="{{ asset('images/categories/3.png') }}">
                                    </a>
                                </div>

                                {{-- Culture --}}
                                <div class="col-6 col-md-3 col-lg-3">
                                    {{-- <div class="col-6 col-lg-3"> --}}
                                    <label for="culture" class="icon-position">Culture</label>
                                    <a href="{{ route('posts.create', ['category_id' => 4]) }}"
                                        class="d-flex justify-content-center align-items-center user-color custom-icon-user">
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
                        <div class="col-md-4 col-lg-4">
                            {{-- Icon --}}
                            <div
                                class="d-flex justify-content-center align-items-center position-relative custom-logo-container">
                                <img src="{{ asset($logo_blue_url) }}" alt="logo" class="logo-organizer">
                                <span class="overlay-text">Organizer</span>
                            </div>
                        </div>

                        <div class="col-md-8 col-lg-8">
                            <div class="row h-100">
                                {{-- Event --}}
                                <div class="col-6 col-md-3 col-lg-3">
                                    <label for="event" class="icon-position icon-organizer">Event</label>
                                    <a href="{{ route('posts.create', ['category_id' => 5]) }}"
                                        class="d-flex justify-content-center align-items-center icon-filter">
                                        <img src="{{ asset('images/categories/2.png') }}">
                                    </a>
                                </div>

                                {{-- Volunteer --}}
                                <div class="col-6 col-md-3 col-lg-3">
                                    <label for="volunteer" class="ms-1 mb-3 mt-4 icon-organizer">Volunteer</label>
                                    <a href="{{ route('posts.create', ['category_id' => 6]) }}"
                                        class="d-flex justify-content-center align-items-center icon-filter">
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


                    <div class="row">
                        <span class="mb-2">User</span>
                        {{-- Info Event --}}
                        <div class="mb-3 d-flex align-items-start  custom-icon-user ms-4">
                            <img src="{{ asset('images/categories/2.png') }}" class="me-3 info-icon-size">
                            <div>
                                <label for="event" class="d-block my-1">My Favarite Event</label>
                                <span>
                                    Share your events in Japan that you've enjoyed or would love to attend.
                                </span>
                            </div>
                        </div>

                        {{-- Info Volunteer --}}
                        <div class="mb-3 d-flex align-items-start  custom-icon-user ms-4">
                            <img src="{{ asset('images/categories/1.png') }}" class="me-3 info-icon-size">
                            <div>
                                <label for="volunteer" class="d-block my-1">Volunteer</label>
                                <span>
                                    Share your volunteering in Japan, you've done or would like to try.
                                </span>
                            </div>
                        </div>

                        {{-- Info Review --}}
                        <div class="mb-3 d-flex align-items-start  custom-icon-user ms-4">
                            <img src="{{ asset('images/categories/3.png') }}" class="me-3 info-icon-size">
                            <div>
                                <label for="Review" class="d-block my-1">My Experience Review</label>
                                <span>
                                    Share your experiences and feelings in Japan.
                                </span>
                            </div>
                        </div>

                        {{-- Info Culture--}}
                        <div class="mb-3 d-flex align-items-start  custom-icon-user ms-4">
                            <img src="{{ asset('images/categories/4.png') }}" class="me-3 info-icon-size">
                            <div>
                                <label for="Culture" class="d-block my-1">Japanese Culture</label>
                                <span>
                                    *Share your impressions of culture.<br>
                                    *Japanese rules you would like to share.
                                </span>
                            </div>
                        </div>
                        <hr>
                        <span class="mb-2">Organizer</span>
                        {{-- Info Organizer Event--}}
                        <div class="mb-3 d-flex align-items-start  icon-filter ms-4">
                            <img src="{{ asset('images/categories/2.png') }}" class="me-3 info-icon-size">
                            <div>
                                <label for="Culture" class="d-block my-1">Event</label>
                                <span>
                                    Event announcements from the organizer side.
                                </span>
                            </div>
                        </div>

                         {{-- Info Organizer Volunteer--}}
                         <div class="mb-3 d-flex align-items-start  icon-filter ms-4">
                            <img src="{{ asset('images/categories/1.png') }}" class="me-3 info-icon-size">
                            <div>
                                <label for="Culture" class="d-block my-1">Volunteer</label>
                                <span>
                                    Volunteer recruitment from the organizer side.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
