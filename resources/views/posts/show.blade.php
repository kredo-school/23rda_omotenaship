@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    <div class="container pt-5 mb-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @if ($post && $post->user)
                    <div class="d-flex justify-content-between mb-2">
                        {{-- Post User --}}
                        <div class="d-flex align-items-center">
                            {{-- user avatar --}}
                            <a href="{{ route('profiles.show', $post->user->id) }}">
                                @if ($post->user->profile && $post->user->profile->avatar)
                                    <img src="{{ $post->user->profile->avatar }}" alt="{{ $post->user->name }}"
                                        class="rounded-circle avatar-sm posts-show-icon mb-0">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary avatar-sm posts-show-icon"></i>
                                @endif
                            </a>
                            {{-- username --}}
                            <a href="{{ route('profiles.show', $post->user->id) }}"
                                class="text-decoration-none text-dark me-auto ms-3 mb-0">
                                {{ $post->user->name }}
                            </a>
                        </div>

                        {{-- Edit Button --}}
                        <div class="d-flex align-items-center">
                            @if (Auth::check() && Auth::user()->id === $post->user->id)
                                <a href="{{ route('posts.edit', ['id' => $post->id]) }}"
                                    class="text-decoration-none text-dark d-flex align-items-center">
                                    <i class="fa-solid fa-pen fa-pen-post"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                @endif

                <div>
                    {{-- Post Date --}}
                    <div class="d-flex justify-content-end mb-1">
                        @if ($post->updated_at > $post->created_at)
                            <div class="text-secondary border border-2 rounded-2 px-1 xsmall">
                                Updated: {{ date('M d, Y', strtotime($post->updated_at)) }}
                            </div>
                        @else
                            <div class="text-secondary border border-2 rounded-2 px-1 xsmall">
                                Posted: {{ date('M d, Y', strtotime($post->created_at)) }}
                            </div>
                        @endif
                    </div>
                </div>

                {{-- image --}}
                <div class="row mb-3">
                    <div class="col">
                        @if ($post->images->isNotEmpty())
                            @foreach ($post->images as $image)
                                <img src="{{ $image->image }}" class="posts-show-image w-100" alt="{{ $image->post_id }}">
                            @endforeach
                        @else
                            <p>No image available</p>
                        @endif
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-10 d-flex justify-content-start">
                        {{-- title --}}
                        <h3 class="m-0">{{ $post->title }}</h3>
                    </div>

                    {{-- Like --}}
                    <div class="col-2 d-flex justify-content-end">
                        {{-- Like button --}}
                        @include('components.like')

                        {{-- Favorite --}}
                        <div class="d-flex align-items-center">
                            @if (Auth::check())

                                <button type="submit" class="border-0 bg-transparent"
                                    id="favorite-button-{{ $post->id }}" data-post-id="{{ $post->id }}">
                                    @if ($post->isFavorited(Auth::user()))
                                        <i class="fa-solid fa-star fa-star-post text-warning fa-2x d-flex align-items-center"
                                            id="favorite-icon-{{ $post->id }}"></i>
                                    @else
                                        <i class="fa-regular fa-star fa-star-post fa-2x d-flex align-items-center"
                                            id="favorite-icon-{{ $post->id }}"></i>
                                    @endif
                                </button>
                            @else
                                <a href="{{ route('login') }}" class="text-decoration-none">
                                    <button class="border-0 bg-transparent" onclick="alert('Please Login');">
                                        <i class="fa-regular fa-star fa-star-post fa-2x text-black"></i>
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Post tags --}}
                <div class="d-flex justify-content-between mb-3">
                    {{-- Left --}}
                    <div>
                        {{-- User visits --}}
                        @if ($post->visit_date)
                            <div class="text-secondary border border-2 rounded-2 px-1 xsmall">
                                User visits: {{ date('M d, Y', strtotime($post->visit_date)) }}
                            </div>
                        @endif
                        {{-- Category --}}
                        <div class="">
                            @foreach ($post->postCategories as $post_category)
                                <div class="badge bg-secondary bg-opacity-50">
                                    {{ $post_category->category->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Right --}}
                    <div class="d-flex flex-column align-items-end">
                        {{-- Event starts --}}
                        @if ($post->start_date)
                            <div class="text-secondary border border-2 rounded-2 mb-1 px-1 xsmall">
                                Evnet starts: {{ date('M d, Y', strtotime($post->start_date)) }}
                            </div>
                        @endif
                        {{-- Event ends --}}
                        @if ($post->end_date)
                            <div class="text-secondary border border-2 rounded-2 px-1 xsmall">
                                Event ends: {{ date('M d, Y', strtotime($post->end_date)) }}
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Article --}}
                <div class="row mb-3">
                    <div class="col">
                        <p class="d-inline fw-light" id="article" data-language="{{ $post->language }}">
                            {!! nl2br(e($post->article)) !!}
                        </p>
                    </div>
                </div>

                {{-- Read Aloud Button --}}
                <div class="mb-3">
                    {{-- Button --}}
                    <button type="button" class="btn btn-secondary btn-sm mb-2" id="read-aloud-btn"
                        data-post-id="{{ $post->id }}">
                        Read aloud
                    </button>

                    {{-- Player --}}
                    <audio controls id="audio-player" class=""></audio>
                </div>

                <hr>

                {{-- Translate Button --}}
                <div class="mb-3">
                    <button type="button" class="btn btn-secondary btn-sm" id="translate-btn">
                        Translate to your language
                    </button>
                </div>

                {{-- Translated result  --}}
                <div id="translated-result">
                    {{-- Translated Article --}}
                    <div class="row mb-3">
                        <div class="col">
                            <p class="d-inline fw-light" id="translated-article"></p>
                        </div>
                    </div>

                    {{-- Read Aloud Button for translated article --}}
                    <div class="mb-3">
                        {{-- Button --}}
                        <button type="button" class="btn btn-secondary btn-sm mb-2" id="read-aloud-btn-translated">
                            Read aloud
                        </button>

                        {{-- Player --}}
                        <audio controls id="audio-player-translated"></audio>
                    </div>
                </div>

                <hr>

                {{-- Geological Info --}}
                @if ($post->event_latitude && $post->event_longitude)
                    <div class="row">
                        <div class="col-sm-8">
                            {{-- Google Map --}}
                            <div id="google-maps-posts-show"></div>
                            <div id="post-data" data-post-id="{{ $post->id }}"
                                data-post-lat="{{ $post->event_latitude }}" data-post-lng="{{ $post->event_longitude }}">
                            </div>
                            @push('script')
                                <script
                                    src="https://maps.googleapis.com/maps/api/js?language=en&region=US&key={{ config('services.google_maps.api_key') }}&callback=initMap&libraries=places"
                                    async defer></script>
                                <script src="{{ asset('js/google-maps/main.js') }}"></script>
                            @endpush
                        </div>

                        <div class="col-sm-4">
                            {{-- OpenWeatherMap --}}
                            <div id="weather-info" class="border pb-3"></div>
                            <div id="open-weather-map-data"
                                data-open-weather-map-api-key="{{ config('services.open_weather_map.api_key') }}"></div>
                            @push('script')
                                <script src="{{ asset('js/open-weather-map/main.js') }}"></script>
                            @endpush
                        </div>
                    </div>

                    <hr>
                @endif

                {{-- post comment --}}
                <div class="row">
                    <div class="col">
                        @auth
                            <form action="{{ route('comments.store', ['post_id' => $post->id]) }}" method="post">
                                @csrf
                                <div class="input-group mb-3">
                                    <textarea name="comment" id="{{ $post->id }}" rows="1" class="form-control form-control-sm"
                                        placeholder="{{ __('Add a comment...') }}">{{ old('comment') }}</textarea>
                                    <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
                                </div>
                                <!-- Error -->
                                @error('comment')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </form>
                        @else
                            <p class="text-center">
                                <a href="{{ route('login') }}" class="text-decoration-none">Login to post a comment</a>
                            </p>
                        @endauth
                    </div>
                </div>

                {{-- show comments --}}
                <div class="row">
                    <div class="col">
                        @if ($post->comments->isNotEmpty())
                            <ul class="list-group mt-2">
                                @foreach ($post->comments as $comment)
                                    <li class="list-group-item border-0 p-0 mb-2">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('profiles.show', $comment->user->id) }}">
                                                @if (isset($comment->user->profile->avatar) && $comment->user->profile->avatar)
                                                    <img src="{{ $comment->user->profile->avatar }}"
                                                        alt="{{ $comment->user->name }}"
                                                        class="rounded-circle avatar-sm posts-show-icon">
                                                @else
                                                    <i
                                                        class="fa-solid fa-circle-user text-secondary avatar-sm posts-show-icon"></i>
                                                @endif
                                            </a>
                                            <div class="d-flex align-items-center ms-2">
                                                <a href="{{ route('profiles.show', $comment->user->id) }}"
                                                    class="text-decoration-none text-dark fw-bold">
                                                    {{ $comment->user->name }}
                                                </a>

                                                <span
                                                    class="text-uppercase text-muted xsmall ps-5">{{ date('M d, Y', strtotime($comment->created_at)) }}</span>
                                            </div>

                                            @if (Auth::check() && Auth::user()->id === $comment->user->id)
                                                <form action="{{ route('comments.destroy', $comment->id) }}"
                                                    method="post" class="ms-3">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="border-0 bg-transparent text-danger pb-2 xsmall"><i
                                                            class="fa-solid fa-trash-can text-kurenai"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>

                                        <p class="d-inline fw-light ps-5 ms-2">{{ $comment->comment }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- JS for this view --}}
@push('script')
    @vite('resources/js/pages/posts/show.js')
@endpush
