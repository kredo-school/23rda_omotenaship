@extends('layouts.app')

@section('title', 'Direct-Messages')

@section('content')
    @include('components.navbar')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h2><span class="mt-2 text-center heading-kurenai">Direct Messages</span></h2>
                <div class="row mb-3">
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
                </div>
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('images/users/marry.png') }}" class="mt-1">
                    </div>
                    <div class="col-6 mt-3">
                        <p class="mb-0">John Smith</p>
                        <small>2024/08/03 20:00</small>
                    </div>
                    <div class="col-2">
                        <img src="{{ asset('images/users/else.png') }}" class="mt-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 pt-0">
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


            <div class="col-9 user-chat">
                <div class="row justify-content-center align-items-center">
                    <div class="col-6 d-flex align-items-center">
                        <img src="{{ asset('images/users/john.png') }}" class="mr-2">
                        <h2 class="text-bold">John Smith</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="balloon-chat left">
                        <figure class="icon-img"><img src="{{ asset('images/users/john.png') }}" alt="john">
                            {{-- <figcaption class="icon-name">john smith</figcaption> --}}
                        </figure>
                        <div class="chatting">
                            <p class="chat-text">Hello!</p>
                            <p class="chat-text">Nice to meet you!</p>
                        </div>
                        <div class="pt-5">10:00</div>
                    </div>

                    <div class="balloon-chat right">
                        <figure class="icon-img"><img src="{{ asset('images/users/mike.png') }}">
                            {{-- <figcaption class="icon-name">アイコンの名前</figcaption> --}}
                        </figure>
                        <div class="chatting">
                            <p class="chat-text">Hello!</p>
                        </div>
                        <div class="pt-5">10:10</div>
                    </div>

                    <div class="balloon-chat left">
                        <figure class="icon-img"><img src="{{ asset('images/users/john.png') }}" alt="john">
                            {{-- <figcaption class="icon-name">john smith</figcaption> --}}
                        </figure>
                        <div class="chatting">
                            <p class="chat-text">Your review is so nice!</p>
                        </div>
                        <div class="pt-5">10:20</div>
                    </div>

                    <div class="balloon-chat right">
                        <figure class="icon-img"><img src="{{ asset('images/users/mike.png') }}">
                            {{-- <figcaption class="icon-name">アイコンの名前</figcaption> --}}
                        </figure>
                        <div class="chatting">
                            <p class="chat-text">Thank you very much!</p>
                        </div>
                        <div class="pt-5">10:25</div>
                    </div>

                    <div class="balloon-chat left">
                        <figure class="icon-img"><img src="{{ asset('images/users/john.png') }}" alt="john">
                            {{-- <figcaption class="icon-name">john smith</figcaption> --}}
                        </figure>
                        <div class="chatting">
                            <p class="chat-text">Where do you recomended?</p>
                        </div>
                        <div class="pt-5">10:30</div>
                    </div>

                </div>
                <div class="row justify-content-center align-items-center">
                    <label for="send" class="col-form-label text-black"></label>
                    <div class="col-6 d-flex align-items-center">
                        <input id="send" type="text" class="form-control mr-2"name="send" placeholder="Add message">
                        <button type="submit" class="btn bg-kurenai w-25 d-flex justify-content-center align-items-center mb-1">
                            <img src="{{ asset('images/users/send.png') }}">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @include('components.footer')
    @endsection
