@extends('layouts.app')

@section('title', 'Favorites')

@section('content')

    @include('components.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">

                {{-- Heading --}}
                <h2 class="mb-3"><span class="px-2 heading-kurenai">Favorite</span></h2>

                {{-- Posts --}}
                <div class="row justify-content-around">
                    @forelse ($posts as $post)
                        <div class="col-md-6 mb-3 d-flex justify-content-center">
                            @include('components.post')
                        </div>
                    @empty
                        No posts yet!
                    @endforelse

                </div>
            </div>

            <div class="col-lg-4">
                {{-- Sidebar --}}
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        @include('components.calendar')
                    </div>

                    <div class="col-12 col-md-6 col-lg-12">
                        @include('components.caregory-icons')
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('components.footer')

@endsection
