@extends('layouts.app')

@section('title', 'Favorites')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                {{-- Heading --}}
                <h2 class="mb-3"><span class="px-2 heading-kurenai">Favorite</span></h2>

                {{-- Posts --}}
                <div class="row">
                    @forelse ($posts as $post)
                        <div class="col-lg-4 col-md-6 mb-3 d-flex justify-content-start">
                            @include('components.post', ['post' => $post])
                        </div>
                    @empty
                        <p>No favorite posts yet!</p>
                    @endforelse
                </div>

                {{-- Pagination Link --}}
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
