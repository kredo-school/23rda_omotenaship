@extends('layouts.app')

@section('title', 'Direct-Messages')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mt-4 d-flex justify-content-center">
                <h2><span class="heading-kurenai">Direct Messages</span></h2>
            </div>
            <div class="row mb-3">
                <div class="col d-flex justify-content-end p-0">
                    <img src="{{ asset('images/users/john.png') }}" class="mt-3 img-fluid">
                </div>
                <div class="col mt-5 d-flex justify-content-center">
                    <p class="mb-0">John Smith/</p>
                    <small>2024/08/03/20:00</small>
                </div>
                <div class="col mt-2 p-0">
                    <img src="{{ asset('images/users/else.png') }}" class="mt-5 img-fluid">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col d-flex justify-content-end p-0">
                    <img src="{{ asset('images/users/marry.png') }}" class="mt-3 img-fluid">
                </div>
                <div class="col mt-5 d-flex justify-content-center">
                    <p class="mb-0">John Smith/</p>
                    <small>2024/08/03/20:00</small>
                </div>
                <div class="col mt-2 p-0">
                    <img src="{{ asset('images/users/else.png') }}" class="mt-5 img-fluid">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col d-flex justify-content-end p-0">
                    <img src="{{ asset('images/users/mike.png') }}" class="mt-3 img-fluid">
                </div>
                <div class="col mt-5 d-flex justify-content-center">
                    <p class="mb-0">John Smith/</p>
                    <small>2024/08/03/20:00</small>
                </div>
                <div class="col mt-2 p-0">
                    <img src="{{ asset('images/users/else.png') }}" class="mt-5 img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
