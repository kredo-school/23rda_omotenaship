@extends('layouts.app')

@section('title', 'Show Prfile')

@section('content')

    @include('components.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">

            <!-- prfile -->
            <div class="row col-lg-4 mx-auto p-0 d-flex justify-content-center">
                <form action="" method="" class="bg-white shadow rounded-3 p-2" enctype="multipart/form-data">
                    <div class="row col mx-auto p-2">
                        {{-- Abatar --}}
                        <div>
                            @php
                                // dd($profile);
                                // dd($profile->first_name);
                                // dd($profile->avatar);
                            @endphp
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
                                    {{ $profile->first_name }} {{ $profile->middle_name }} {{ $profile->last_name }}
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
                            <div 
                                class="contenedor-pf mx-auto d-flex justify-content-center text-secondary fs-10 fw-normal  col-0 m-0 px-2 py-0">
                                <input id='leer' type="checkbox" />
                                <label for="leer"></label>
                                <div class="expand-pf">
                                    <p class='content'>{{ $profile->introduction }}</p>
                                </div>
                            </div>
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
                            @if (Auth::id() == $user->id)
                            <a href={{ route('profiles.edit', $user->id) }} class="btn btn-kurenai-pf btn-lg p-1 mb-2"">
                                Edit Profile
                            @endif
                            </a>
                        </div>
                    </div>
                </form>
            </div>


            <!-- My Posts-->
            <div class="row col-lg-8 mx-auto p-0 d-flex align-items-start justify-content-center ">
                <div class="row">
                    {{-- My Post --}}
                    <div class="section-header">
                        <h2>
                            <span class="px-2 heading-kurenai">
                                My Post
                            </span>
                        </h2>
                    </div>

                    {{-- My Posts --}}
                    <div class="row ">
                        @forelse ($posts as $post)
                            <div class="col-6 mb-3">
                                @include('components.post')
                            </div>
                        @empty
                            No posts yet!
                        @endforelse
                    </div>

                    {{-- Pagination Link --}}
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection
