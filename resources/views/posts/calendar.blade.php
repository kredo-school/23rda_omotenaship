@extends('layouts.app')

@section('title', 'Post Calender')

@section('content')
    {{-- Temp --}}
    @php
        $auth_user = session('auth_user');
        Log::info('Check the value of $auth_user on view.posts.index:', ['auth_user' => $auth_user]);
    @endphp

    @include('components.navbar')

    <div class="container mt-5">
        <div class="row">
            {{-- Left Column --}}
            <div class="col-8">

                {{-- Heading --}}
                <h2 class="mb-3">
                    <span class="px-2 heading-kurenai">Event on </span>
                    <span id="selected-date" class="px-2 heading-kurenai"></span>
                </h2>

                {{-- Posts --}}
                <div class="row">
                    @forelse ($posts as $post)
                        <div class="col-6 mb-3">
                            @include('components.post', ['post' => $post])
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

            {{-- Right Colmun --}}
            <div class="col-4">
                {{-- Calendar --}}
                @include('components.calendar')

                @include('components.category-icons')
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('components.footer')
@endsection

