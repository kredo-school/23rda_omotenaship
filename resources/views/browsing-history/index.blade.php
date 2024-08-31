@extends('layouts.app')

@section('title', 'Browsing-history')

@section('content')

    @include('components.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-auto">
                {{-- Heading --}}
                <h2 class="mb-3"><span class="px-2 heading-kurenai text-bold">Browsing History</span></h2>

                {{-- Posts --}}
                <div class="row">
                    @forelse ($posts as $post)
                        <div class="col mb-3">
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

    {{-- Footer --}}
    @include('components.footer')
@endsection
