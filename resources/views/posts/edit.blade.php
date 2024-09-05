@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    @include('components.navbar')
    <div class="container pt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                {{-- heading --}}
                <h2 class="heading-kurenai col-3"><span>Edit Post</span></h2>

                <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- category --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="category" class="form-label d-block fw-bold">
                                Category
                            </label>
                            @foreach ($all_categories as $category)
                                <div class="form-check form-check-inline">
                                    @if (in_array($category->id, $selected_categories))
                                        <input type="checkbox" name="categories[]" id="{{ $category->name }}"
                                            value="{{ $category->id }}" class="form-check-input" checked>

                                        <label for="{{ $category->name }}"
                                            class="form-check-label">{{ $category->name }}</label>
                                    @else
                                        <input type="checkbox" name="categories[]" id="{{ $category->name }}"
                                            value="{{ $category->id }}" class="form-check-input">

                                        <label for="{{ $category->name }}"
                                            class="form-check-label">{{ $category->name }}</label>
                                    @endif
                                </div>
                            @endforeach
                            <!-- Error -->
                            @error('categories')
                                <div class="text-danger small">{{ $message }}</div>
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
                    {{-- artical --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="article" class="form-label fw-bold">Article</label>
                            <textarea name="article" id="article" rows="3" class="form-control">{{ old('article', $post->article) }}</textarea>
                            <!-- Error -->
                            @error('article')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- images --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="image" class="form-label fw-bold">Image</label>
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
                                <p class="mb-0">The acceptable formats are jpeg, jpg, png and gif only.</p>
                                <p class="mb-0">Maximum file size is 1048kb.</p>
                            </div>
                            @error('image')
                                <div class="text-danger small">{{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- caption --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="caption" class="form-label fw-bold">Caption</label>
                            <textarea name="caption" id="caption" class="form-control">{{ old('caption', $post->caption) }}</textarea>
                            <!-- Error -->
                            @error('caption')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- visit_Date --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="Date of visit" class="form-label fw-bold">Date of visit</label>
                            <br>
                            <input type="date" id="Date of visit" name="visit_date" class="rounded-2"
                                value="{{ old('visit_date', $post->visit_date) }}">
                            <!-- Error -->
                            @error('visit_date')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- Area of japan --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="area" class="form-label fw-bold">Area of Japan</label>
                            <select class="form-select form-select-lg mb-3" name="area_id" id="area">
                                @foreach ($all_areas as $area)
                                    <option value="{{ $area->id }}"
                                        {{ old('area_id', $post->area_id) == $area->id ? 'selected' : '' }}>
                                        {{ $area->name }}
                                    </option>
                                @endforeach
                            </select>

                            <!-- Error -->
                            @error('area_id')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- prefecture --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="Prefecture" class="form-label fw-bold">Prefecture of Japan</label>
                            {{-- <select class="form-select form-select-lg mb-3" name="prefecture_id" id="prefecture">
                                @foreach ($all_prefectures as $prefecture)
                                    <option value="{{ $prefecture->id }}"
                                        {{ old('prefecture_id', $post->prefecture_id) == $prefecture->id ? 'selected' : '' }}>
                                        {{ $prefecture->name }}
                                    </option>
                                @endforeach
                            </select> --}}
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
                    {{-- Date of Event --}}
                    <div class="row mb-4">
                        <div class="col mb-4">
                            <p class="form-label fw-bold m-0">Date of Event</p>
                            <div class="row">
                                <div class="col">
                                    <label for="start_date" class="date-edit">
                                        <span>Start</span>
                                    </label>
                                    <input type="date" class="rounded-2" id="start_date" name="start_date"
                                        value="{{ old('start_date', $post->start_date) }}">
                                    <!-- Error -->
                                    @error('start_date')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="end_date" class="date-edit">
                                        <span> End </span>
                                    </label>
                                    <input type="date" class="rounded-2" id="end_date" name="end_date"
                                        value="{{ old('end_date', $post->end_date) }}">
                                    <!-- Error -->
                                    @error('end_date')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- save Button --}}
                    <div class="row">
                        <div class="mb-4 col-6 mx-auto d-grid gap-2">
                            <button type="submit" class="btn btn-kurenai-pf btn-lg p-1 mb-2" id="post-button">
                                {{-- class="btn post-button-kurenai btn-lg px-5 text-white btn-kurenai btn-kurenai:hover" --}}
                                Save
                            </button>
                            {{-- Delete Button --}}
                            <button type="button" class="btn btn-white-pf btn-lg p-1" data-bs-toggle="modal"
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
    {{-- include footer --}}
    @include('components.footer')
@endsection
