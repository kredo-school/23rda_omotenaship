@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="container pt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                {{-- heading --}}
                <h2 class="text-start mb-3">
                    <span class="px-2 heading-kurenai">Edit Post</span>
                </h2>

                {{-- Post Type --}}
                <p class="">Post Type:
                    <span class="fw-bold">{{ $category_name }}</span>
                </p>

                <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- category --}}
                    {{-- [Design changed] Only one category can be selected and automatically sent to here --}}
                    <input type="hidden" name="category_id" value="{{ $category_id }}">

                    {{-- Image --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="image" class="form-label fw-bold">Post Image</label>
                            @if ($post->images->isNotEmpty())
                                @foreach ($post->images as $image)
                                    <img src="{{ $image->image }}" class="posts-show-image w-100 mb-2"
                                        alt="{{ $image->post_id }}">
                                @endforeach
                            @else
                                <p>No image</p>
                            @endif

                            <input type="file" name="image" id="image" class="form-control mt-1"
                                aria-describedby="image-info">
                            <div class="form-text" id="image-info">
                                <p class="mb-0 small">
                                    The acceptable formats are jpeg, jpg, png and gif only.<br>
                                    Maximum file size is 1048kb.
                                </p>
                            </div>
                            @error('image')
                                <div class="text-danger small">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- title --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="title" class="form-label fw-bold">Title</label>
                            <textarea name="title" id="title" class="form-control">{{ old('title', $post->title) }}</textarea>

                            <!-- Error -->
                            @error('title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- article --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="article" class="form-label fw-bold">Article</label>
                            <textarea name="article" id="article" rows="20" class="form-control">{{ old('article', $post->article) }}</textarea>
                            <!-- Error -->
                            @error('article')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- 5: Event Organizeer --}}
                    {{-- 6: Volunteer Organizeer --}}
                    @if ($category_id !== 5 && $category_id !== 6)
                        {{-- Date of your visit --}}
                        <div class="row">
                            <div class="col mb-4 w-100">
                                <label for="Date of visit" class="form-label fw-bold">Date of your visit</label>
                                <br>
                                <label class="visit_date w-100 posts_input_box">
                                    <input type="date" name="visit_date"
                                        value="{{ old('visit_date', $post->visit_date) }}" class="form-control rounded-2">
                                </label>

                                <!-- Error -->
                                @error('visit_date')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endif

                    {{-- prefecture --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="Prefecture" class="form-label fw-bold">Prefecture in Japan</label>

                            <select name="prefecture_id" id="prefecture_id" class="form-select">
                                @foreach ($prefectures_by_area as $area => $prefectures)
                                    <optgroup label="{{ $area }}">
                                        @foreach ($prefectures as $prefecture)
                                            <option value="{{ $prefecture->id }}"
                                                {{ old('prefecture_id', $post->prefecture_id) == $prefecture->id ? 'selected' : '' }}>
                                                {{ $prefecture->name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>

                            <!-- Error -->
                            @error('prefecture_id')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="row">
                        <div class="col mb-4 w-100">
                            <label for="event-address" class="form-label fw-bold posts_input_box">Address</label>
                            <input type="text" name="event_address" value="{{ old('event_address', $post->event_address) }}" id="event-address"
                                class="form-control">

                            <!-- Error -->
                            @error('event_address')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Date of Event --}}
                    @if ($category_id !== 1 && $category_id !== 4)
                        {{-- 1: Review --}}
                        {{-- 4: Culture --}}
                        <div class="row mb-4">
                            <div class="col mb-4 w-100">
                                <p class="form-label fw-bold m-0">Date of Event</p>
                                <div class="row">
                                    {{-- Start date --}}
                                    <div class="col">
                                        <label for="start_date">
                                            <span>Start</span>
                                        </label>
                                        <input type="date" name="start_date" value="{{ old('start_date', $post->start_date) }}"
                                            class="rounded-2 form-control" id="start_date">

                                        <!-- Error -->
                                        @error('start_date')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- End date --}}
                                    <div class="col">
                                        <label for="end_date">
                                            <span> End </span>
                                        </label>
                                        <input type="date" name="end_date" value="{{ old('end_date', $post->end_date) }}"
                                            class="rounded-2 form-control" id="end_date">

                                        <!-- Error -->
                                        @error('end_date')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Buttons --}}
                    <div class="row">
                        <div class="mb-4 col mx-auto d-grid gap-2">
                            {{-- Save Button --}}
                            <button type="submit" class="btn btn-kurenai-pf btn-lg p-1 mb-2 w-100" id="post-button">
                                {{-- class="btn post-button-kurenai btn-lg px-5 text-white btn-kurenai btn-kurenai:hover" --}}
                                Save
                            </button>

                            {{-- Delete Button --}}
                            <button type="button" class="btn btn-white-pf btn-lg p-1 w-100" data-bs-toggle="modal"
                                data-bs-target="#delete-post-modal-{{ $post->id }}">
                                Delete
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- include delete modal  --}}
    @include('components.delete-post-modal')
@endsection
