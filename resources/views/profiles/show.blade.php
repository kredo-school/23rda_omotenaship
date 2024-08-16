@extends('layouts.app')

@section('title', 'Show Prfile')

@section('content')

    @include('components.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">

            <!-- prfile -->
            <div class="row col-lg-3 mx-auto p-0 d-flex justify-content-center">
                <form action="" method="" class="bg-white shadow rounded-3 p-2" enctype="multipart/form-data">
                    <div class="row col mx-auto p-2">
                        {{-- Abatar --}}
                        <div>

                            @if ($profile->avatar)
                                <img src="{{ $profile->avatar }}" alt="#" 
                                class="mx-auto d-flex justify-content-center align-items-center abatar-pf-show">
                            @else
                                <img src="{{ asset('images\profile_sample1.png') }}" alt=""
                                    class="mx-auto d-flex justify-content-center align-items-center abatar-pf-show">
                            @endif

                        </div>
                        {{-- Name --}}
                        <div class="row mx-auto">
                            <h5 class="mx-auto d-flex justify-content-center align-items-center">
                                <span>
                                    {{ $profile->first_name }} {{ $profile->last_name }} {{ $profile->middle_name }}
                                </span>
                            </h5>
                        </div>

                        {{-- Introduction --}}
                        <div class="row mx-auto mb-5">
                            {{-- Introduction -Title --}}
                            <h5 class="mx-auto d-flex text-start text-secondary col-12 m-0 px-2 py-3">
                                Introduction
                            </h5>
                            {{-- Introduction -Text --}}
                            <p
                                class="mx-auto d-flex justify-content-center text-secondary fs-10 fw-normal  col-11 m-0 px-2 py-0">
                                {{ $profile->introduction }} 
                            </p>
                        </div>


                        {{-- Language --}}
                        <div class="row mx-auto mb-5">
                            <h5 class="mx-auto d-flex text-start text-secondary col-12 m-0 px-2 py-3">
                                Language : {{ $profile->language }}
                            </h5>
                        </div>

                        {{-- Button --}}
                        <div class="d-flex flex-column align-items-center">
                            {{-- Edit Profile --}}
                            {{-- temporary --}}
                            @php
                                $user_id = 2;
                            @endphp
                            <a href={{ route('profiles.edit', $user_id) }} class="btn btn-kurenai-pf btn-lg p-1 mb-2"">
                                Edit Profile
                            </a>
                            {{-- Delete Account --}}
                            <button type="button" class="btn btn-white-pf btn-lg p-1">
                                Delete Account
                            </button>
                        </div>
                    </div>
                </form>
            </div>


            <!-- Posts-->
            <div
                class="col-lg-8
                                mx-auto p-0 d-flex justify-content-center>
                                <div class="row">
                <div class="row">
                    {{-- My Post --}}
                    <div class="section-header">
                        <h2>
                            <span class="px-2 heading-kurenai">
                                My Post
                            </span>
                        </h2>
                    </div>

                    {{-- New Post --}}
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
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection
