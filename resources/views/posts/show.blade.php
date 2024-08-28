@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    @include('components.navbar')
    <div class="container pt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-7">
                {{-- username --}}
                @if ($post && $post->user)
                    <div class="row">
                        <div class="col d-flex align-items-center mb-2">
                            <a href="{{ route('profiles.show', $post->user->id) }}">
                                @if ($post->user->profile && $post->user->profile->avatar)
                                    <img src="{{ $post->user->profile->avatar }}" alt="{{ $post->user->name }}"
                                        class="rounded-circle avatar-sm posts-show-icon">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-lg me-2"></i>
                                @endif
                            </a>
                            <a href="{{ route('profiles.show', $post->user->id) }}"
                                class="text-decoration-none text-dark me-auto ms-3">
                                {{ $post->user->name }}
                            </a>
                        </div>
                        {{-- Edit --}}
                        <div class="col d-flex justify-content-end">
                            @if (Auth::check() && Auth::user()->id === $post->user->id)
                                <a href="{{ route('posts.edit', ['id' => $post->id]) }}"
                                    class="text-decoration-none text-dark d-flex align-items-center">
                                    <i class="fa-solid fa-pen fa-pen-post"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                @endif

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
                    <div class="col-10 d-flex justify-content-start">
                        {{-- title and icon --}}
                        <h3 class="m-0">{{ $post->title }}</h3>
                    </div>

                    {{-- Like --}}
                    <div class="col-2 d-flex justify-content-end">
                        @if ($post->isLiked())
                            <form action="{{ route('likes.destroy', ['post_id' => $post->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm p-0">
                                    <i class="fa-solid fa-heart fa-heart-post text-danger d-flex align-items-center"></i>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('likes.store', ['post_id' => $post->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm shadow-none p-0">
                                    <i class="fa-regular fa-heart fa-heart-post d-flex align-items-center"></i>
                                </button>
                            </form>
                        @endif


                        <div class="px-2">
                            <span class="d-flex align-items-center">{{ $post->likes->count() }}</span>
                        </div>
                        {{-- Favorite --}}
                        <div class="">

                            @if (Auth::check())
                                @if ($post->isFavorited(Auth::user()))
                                    <form action="{{ route('favorites.destroy', $post->id) }}" method="post"
                                        class="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i
                                                class="fa-solid fa-star fa-star-post text-warning fa-2x d-flex align-items-center"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('favorites.store', ['post_id' => $post->id]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="fa-regular fa-star fa-star-post fa-2x d-flex align-items-center"></i>
                                        </button>
                                    </form>
                                @endif
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

                {{-- date of post --}}
                <div class="row">
                    <div class="col">
                        <p class="xsmall text-secondary">
                            <small>{{ date('Y-m-d', strtotime($post->create_at)) }}</small>
                        </p>
                    </div>
                </div>

                {{-- avatar,username and category --}}
                <div class="row">
                    <div class="col">
                        <div class="d-flex align-items-center mb-2">

                            @foreach ($post->postCategories as $post_category)
                                <div class="badge bg-secondary bg-opacity-50">
                                    {{ $post_category->category->name }}
                                </div>
                            @endforeach
                        </div>
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
                                                @if ($comment->user->profile->avatar)
                                                    <img src="{{ $comment->user->profile->avatar }}"
                                                        alt="{{ $comment->user->name }}"
                                                        class="rounded-circle avatar-sm posts-show-icon">
                                                @else
                                                    <i class="fa-solid fa-circle-user text-secondary icon-lg me-2"></i>
                                                @endif
                                            </a>
                                            <div class="d-flex align-items-center ms-2">
                                                <a href="{{ route('profiles.show', $post->id) }}"
                                                    class="text-decoration-none text-dark fw-bold">
                                                    {{ $comment->user->name }}
                                                </a>

                                                <span
                                                    class="text-uppercase text-muted xsmall ps-5">{{ date('M d, Y', strtotime($comment->created_at)) }}</span>
                                            </div>

                                            @if (Auth::check() && Auth::user()->id === $comment->user->id)
                                                <form action="{{ route('comments.destroy', $comment->id) }}" method="post"
                                                    class="ms-3">
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

    @include('components.footer')
@endsection
