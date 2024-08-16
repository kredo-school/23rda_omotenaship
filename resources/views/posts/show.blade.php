@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    @include('components.navbar')
    <div class="container pt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-7">

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
                <div class="row">
                    {{-- title and icon --}}
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-r">
                            <h3>{{ $post->title }}</h3>
                            <a href="{{ route('posts.edit') }}" class="text-decoration-none text-dark">
                                <i class="fa-solid fa-pen icon-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- avatar,username and category --}}
                <div class="row">
                    <div class="col">
                        <div class="d-flex align-items-center mb-2">
                            {{-- <a href="{{ route('profile.show', Auth::user()->id) }}">
                                @if (Auth::user()->avatar)
                                    <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                                        class="rounded-circle posts-show-icon">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-lg me-2"></i>
                                @endif
                            </a> --}}

                            <img src="{{ $post->user->profile->avatar }}" alt="{{ $post->user->name }}" class="rounded-circle avatar-sm posts-show-icon">

                            <a href="#" class="text-decoration-none text-dark me-auto ms-3">
                                {{ $post->user->name }}
                            </a>

                            {{-- <i class="fa-solid fa-rectangle-ad"></i> --}}
                            @foreach ($post->postCategories as $post_category)
                                <div class="badge bg-secondary bg-opacity-50">
                                    {{ $post_category->category->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- date of post --}}
                <div class="row">
                    <div class="col">
                        <p class="xsmall text-secondary">
                            <small>{{ date('Y-m-d', strtotime($post->create_at)) }}</small>
                        </p>
                    </div>
                </div>
                {{-- discription --}}
                <div class="row mb-5">
                    <div class="col">
                        <p class="d-inline fw-light">
                            {{ $post->article }}
                        </p>
                    </div>
                </div>
                {{-- post comment --}}
                <div class="row">
                    <div class="col">
                        <form action="#" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <textarea name="comment_body" rows="1" class="form-control form-control-sm" placeholder="Add a comment...">{{ old('comment_body') }}</textarea>
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- show comments --}}
                <div class="row">
                    <div class="col">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa-solid fa-circle-user text-secondary icon-sm me-2"></i>
                            <a href="#" class="text-decoration-none text-dark me-auto mt-0 pt-0">Mary Watson</a>
                            <p class="show-date">2024-06-10</p>
                        </div>
                        <p>beautiful place</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection
Ï
