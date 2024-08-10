@extends('layouts.app')

@section('title', 'Event near You')

@section('content')
    {{-- Navbar --}}
    @include('components.navbar')
    <div class="container">
        <div class="row mt-5 mb-3">
            {{-- Heading --}}
            <h2 class="mb-3"><span class="px-2 heading-kurenai">Event near You</span></h2>
        </div>
        <div class="row mb-5">
            <img src="{{ asset('images/eventnearyou.png') }}" alt="eventnearyou">
        </div>
        <div class="row">
            <div class="col mb-3">
                @include('components.post')
            </div>
            <div class="col mb-3">
                @include('components.post')
            </div>
            <div class="col mb-3">
                @include('components.post')
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('components.footer')
@endsection
