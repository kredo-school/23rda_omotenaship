@php
    $logo_url = 'images/logos/red.jpg';
@endphp
@extends('layouts.app')

@section('title', 'Select Category')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7">

                {{-- heading --}}
                <h2 class="mb-5 mt-5 text-center"><span class="px-2 heading-kurenai">what do you want to share?</span></h2>

                <form action="" method="post">

                    {{-- User's Categories --}}
                    <div class="row m-2 w-100">
                        <div class="col mb-4 form-control d-flex flex-wrap justfy-content-between w-100">

                            {{-- Logo --}}
                            <img src="{{ asset($logo_url) }}" alt="logo" width="140" height="140" class="posts-logo">

                            {{-- Volunteer --}}
                            <div class="col-auto text-center m-4">
                                <a href="{{ route('posts.index', ['category' => 'volunteer']) }}" class="icon-container">
                                    <img src="{{ asset('images/categories/1.png') }}" class="img-fluid">
                                    <span class="hover-text">Volunteer</span>
                                </a>
                            </div>

                            {{-- Event --}}
                            <div class="col-auto text-center m-4">
                                <a href="{{ route('posts.index', ['category' => 'event']) }}" class="icon-container">
                                    <img src="{{ asset('images/categories/2.png') }}" class="img-fluid">
                                    <span class="hover-text">Event</span>
                                </a>
                            </div>

                            {{-- Review --}}
                            <div class="col-auto text-center m-4">
                                <a href="{{ route('posts.index', ['category' => 'review']) }}" class="icon-container">
                                    <img src="{{ asset('images/categories/3.png') }}" class="img-fluid">
                                    <span class="hover-text">Review</span>
                                </a>
                            </div>

                            {{-- Culture --}}
                            <div class="col-auto text-center m-4">
                                <a href="{{ route('posts.index', ['category' => 'culture']) }}" class="icon-container">
                                    <img src="{{ asset('images/categories/4.png') }}" class="img-fluid">
                                    <span class="hover-text">Culture</span>
                                </a>
                            </div>
                        </div>

                        {{-- Organizer's Categories --}}
                    <div class="row w-100 m-2">
                        <div class="col mb-4 form-control d-flex flex-wrap justfy-content-between">

                            {{-- Logo --}}
                            <img src="{{ asset($logo_url) }}" alt="logo" width="140" height="140" class="posts-logo">

                            {{-- Volunteer --}}
                            <div class="col-auto text-center m-4">
                                <a href="{{ route('posts.index', ['category' => 'volunteer']) }}" class="icon-container">
                                    <img src="{{ asset('images/categories/1.png') }}" class="img-fluid">
                                    <span class="hover-text">Volunteer</span>
                                </a>
                            </div>

                            {{-- Event --}}
                            <div class="col-auto text-center m-4">
                                <a href="{{ route('posts.index', ['category' => 'event']) }}" class="icon-container">
                                    <img src="{{ asset('images/categories/2.png') }}" class="img-fluid">
                                    <span class="hover-text">Event</span>
                                </a>
                            </div>

                </form>
            </div>
        </div>
    </div>

@endsection
