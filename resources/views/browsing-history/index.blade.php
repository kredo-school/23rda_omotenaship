@extends('layouts.app')

@section('title', 'Browsing-history')

@section('content')
    <div class="container mt-5">
        <div class="row">
            {{-- Heading --}}
            <h2 class="m-0"><span class="px-2 heading-kurenai text-bold">Browsing History</span></h2>

            {{-- Posts --}}
            <div class="row mb-4 g-3">
                @forelse ($browsingHistories as $history)
                    <div class="col-lg-4">
                        @if ($history->post)
                            @include('components.post', ['post' => $history->post])
                        @else
                            <p>No associated post</p>
                        @endif
                    </div>
                @empty
                    No browsing history yet!
                @endforelse
            </div>

            {{-- Pagination Link --}}
            <div class="d-flex justify-content-center">
                {{ $browsingHistories->links() }}
            </div>
        </div>
    </div>
@endsection

@push('script')
    @vite('resources/js/pages/browsing-history/index.js')
@endpush
