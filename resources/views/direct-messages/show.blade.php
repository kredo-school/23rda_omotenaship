@extends('layouts.app')

@section('title', 'Direct-Messages')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3">
                <h2><span class="text-center text-decoration-underline ">Direct Messages</span></h2>
                <div class="row mb-5">
                    <div class="col-4">
                        <img src="{{ asset('images/users/john.png') }}" class="mt-3">
                    </div>
                    <div class="col-6 mt-4">
                        <p class="mb-0">John Smith</p>
                        <small>2024/08/03</small>
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('images/users/else.png') }}" class="mt-5">
                    </div>

                    <div class="col-4">
                        <img src="{{ asset('images/users/marry.png') }}" class="mt-3">
                    </div>
                    <div class="col-6 mt-4">
                        <p class="mb-0">John Smith</p>
                        <small>2024/08/03 20:00</small>
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('images/users/else.png') }}" class="mt-5">
                    </div>

                    <div class="col-4">
                        <img src="{{ asset('images/users/mike.png') }}" class="mt-3">
                    </div>
                    <div class="col-6 mt-4">
                        <p class="mb-0">John Smith</p>
                        <small>2024/08/03</small>
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('images/users/else.png') }}" class="mt-5">
                    </div>

                </div>
            </div>
            <div class="col-9">
                <div class="row justify-content-center align-items-center">
                    <div class="col-6 d-flex align-items-center">
                        <img src="{{ asset('images/users/john.png') }}" class="mr-2">
                        <h2 class="text-bold">John Smith</h2>
                    </div>
                </div>
                <div class="row">

                </div>
                <div class="row row justify-content-center align-items-center">
                    <label for="send" class="col-form-label text-black"></label>
                    <div class="col-6 d-flex align-items-center">
                        <input id="send" type="text" class="form-control mr-2"name="send" placeholder="Add message">
                        <button type="submit" class="btn bg-kurenai w-25 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/users/send.png') }}">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
