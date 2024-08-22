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

                    <div class="col d-flex justify-content-between">
                        {{-- title and icon --}}
                        <h3 class="m-0">{{ $post->title }}</h3>

                        <div class="d-flex justify-content-end align-items-center">
                            <div class="mt-3">
                                @if (Auth::check())
                                    @if ($post->isFavorited(Auth::user()))
                                        <form action="{{ route('favorites.destroy', $post->id) }}" method="post"
                                            class="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fa-solid fa-star fa-star-post text-warning fa-2x"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('favorites.store', ['post_id' => $post->id]) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fa-regular fa-star fa-star-post fa-2x"></i>
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <button class="border-0 bg-transparent" onclick="alert('Please Login');">
                                        <i class="fa-regular fa-star fa-star-post fa-2x"></i>
                                    </button>
                                @endif
                            </div>
                            <div>
                                {{-- @if (Auth::user()->id === $post->user->id) --}}
                                <a href="{{ route('posts.edit', ['id' => $post->id]) }}"
                                    class="text-decoration-none text-dark">
                                    <i class="fa-solid fa-pen fa-pen-post"></i>

                                </a>
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- avatar,username and category --}}
                <div class="row">
                    <div class="col">
                        <div class="d-flex align-items-center mb-2">
                            <a href="{{ route('profiles.show', $post->id) }}">
                                @if ($post->user->profile->avatar)
                                    <img src="{{ $post->user->profile->avatar }}" alt="{{ $post->user->name }}"
                                        class="rounded-circle avatar-sm posts-show-icon">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-lg me-2"></i>
                                @endif
                            </a>
                            <a href="{{ route('profiles.show', $post->id) }}"
                                class="text-decoration-none text-dark me-auto ms-3">
                                {{ $post->user->name }}
                            </a>

                            @foreach ($post->postCategories as $post_category)
                                <div class="badge bg-secondary bg-opacity-50 ms-1">
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
                        <form action="{{ route('comments.store', $post->id) }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <textarea name="comment" id="{{ $post->id }}" rows="1"
                                    class="form-control form-control-sm" placeholder="Add a comment...">{{ old('comment') }}</textarea>
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
                            </div>
                            <!-- Error -->
                            @error('comment' . $post->id)
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </form>

                    </div>
                </div>
                {{-- show comments --}}
                <div class="row">
                    <div class="col">
                        @if ($post->comments->isNotEmpty())
                            <ul class="list-group mt-2">
                                @foreach ($post->comments as $comment)
                                    <li class="list-group-item border-0 p-0 mb-2">
                                        <a href="#"
                                            class="text-decoration-none text-dark fw-bold">
                                            {{ $comment->user->name }}
                                        </a>
                                        &nbsp;
                                        <p class="d-inline fw-light">{{ $comment->comment }}</p>

                                        @csrf
                                        @method('DELETE')

                                        <span
                                            class="text-uppercase text-muted xsmall">{{ date('M d, Y', strtotime($comment->created_at)) }}</span>

                                            @if (Auth::user()->id === $comment->user->id)
                                            &middot; 
                                            <!-- middle dot -->
                                             <button type="submit" class="border-0 bg-transparent text-danger p-0 xsmall"><i class="fa-solid fa-trash-can text-kurenai"></i></button>
                                         @endif
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection
Ï
