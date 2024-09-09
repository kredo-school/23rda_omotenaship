@extends('layouts.app')

@section('title', 'Show Prfile')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Left Column -->
            <div class="col-xl-4 mb-5">
                {{-- Prfile --}}
                <div class="bg-white shadow rounded-3 p-5">
                    {{-- Avatar --}}
                    <div class="">
                        @if ($profile->avatar)
                            <img src="{{ $profile->avatar }}" alt="" class="d-block mx-auto mb-3 p-0 abatar-pf-show">
                        @else
                            <img src="{{ asset('images\profile_sample1.png') }}" alt=""
                                class="d-block mx-auto mb-3 p-0 abatar-pf-show">
                        @endif
                    </div>

                    {{-- Name --}}
                    <div class="mb-3">
                        <h5 class="text-center">
                            {{ $profile->first_name }}
                            {{ $profile->middle_name }}
                            {{ $profile->last_name }}
                        </h5>
                    </div>

                    {{-- Introduction --}}
                    <div class="mb-5">
                        {{-- Introduction -Title --}}
                        <h5 class="text-start text-secondary">
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
                    <div class="mb-5">
                        <h5 class="text-start text-secondary">
                            Language : {{ $languages[$profile->language] ?? $profile->language }}
                        </h5>
                    </div>

                    {{-- Button --}}
                    <div class="">
                        {{-- Edit Profile --}}
                        @if (Auth::id() == $user->id)
                            <a href={{ route('profiles.edit', $user->id) }} class="btn btn-kurenai-pf w-100">
                                Edit Profile
                            </a>
                        @else
                            {{-- Send Message --}}
                            {{-- If the user is viewing another user's profile --}}
                            <a href="{{ route('user', ['id' => $user->id]) }}" class="btn btn-kurenai-pf w-100">
                                Send Message
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column-->
            <div class="col-xl-8 mb-5">
                {{-- Header --}}
                <div class="section-header">
                    <h2>
                        <span class="px-2 heading-kurenai">
                            My Post
                        </span>
                    </h2>
                </div>

                {{-- My Post --}}
                <div class="row">
                    @forelse ($posts as $post)
                        <div class="col-lg-6 mb-3">
                            @include('components.post')
                        </div>
                    @empty
                        No posts yet!
                    @endforelse

                    {{-- Pagination Link --}}
                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
