@extends('layouts.app')

@section('title', 'New Post')

@section('content')
    @include('components.navbar')
    <div class="container justify-content-center d-flex">
        <div class="row">
            <h2 class="mb-4 col-3 ms-3 mt-3 heading-kurenai"><span>New Post</span></h2>
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- category --}}
                <div class="mb-4 col-auto ms-3">
                    <label for="category" class="form-label d-block fw-bold">
                        Category
                    </label>
                    @foreach ($all_categories as $category)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="categories[]" id="{{ $category->name }}"
                                value="{{ $category->id }}" class="form-check-input">

                            <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                        </div>
                    @endforeach
                    <!-- Error -->
                    @error('catogory')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                {{-- title --}}
                <div class="mb-4 col-10 ms-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <textarea name="title" id="title" class="form-control">{{ old('title') }}</textarea>
                    <!-- Error -->
                    @error('title')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                {{-- artical --}}
                <div class="mb-4 col-10 ms-3">
                    <label for="article" class="form-label fw-bold">Article</label>
                    <textarea name="article" id="article" rows="3" class="form-control">{{ old('article') }}</textarea>
                    <!-- Error -->
                    @error('article')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                {{-- images --}}
                <div class="mb-4 col-10 ms-3">
                    <label for="image" class="form-label fw-bold">Image</label>
                    <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
                    <div class="form-text" id="image-info">
                        <p class="mb-0">The acceptable formats are jpeg, jpg, png and gif only.</p>
                        <p class="mb-0">Maximum file size is 1048kb.</p>
                    </div>
                    {{-- caption --}}
                    <div class="mb-4 col-10 ms-3">
                        <label for="caption" class="form-label fw-bold">Caption</label>
                        <textarea name="caption" id="caption" class="form-control">{{ old('caption') }}</textarea>
                        <!-- Error -->
                        @error('image')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Date --}}
                    <div class="mb-3 col-10 ms-3">
                        <label for="Date of visit" class="form-label fw-bold">Date of visit</label>
                        <br>
                        <label class="date-edit">
                            <input type="date" name="visit_date" class="rounded-2">
                        </label>
                        <!-- Error -->
                        @error('date')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Area of japan --}}
                    <div class="mb-3 col-10 ms-3">
                        <label for="Area of Japan" class="form-label fw-bold">Area of Japan</label>
                        <select class="form-select form-select-lg mb-3" name="area_id" id="area">
                            @foreach ($all_areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>

                        <!-- Error -->
                        @error('date')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- prefecture --}}
                    <div class="mb-3 col-10 ms-3">
                        <label for="Prefecture of Japan" class="form-label fw-bold">Prefecture of Japan</label>
                        <select class="form-select form-select-lg mb-3" name="prefecture_id" id="prefecture">
                            @foreach ($all_prefectures as $prefecture)
                                <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                            @endforeach
                        </select>

                        <!-- Error -->
                        @error('date')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Event --}}
                    <div class="mb-3 col-10 ms-3">
                        <label for="event of date" class="form-label fw-bold">Event of date</label>
                        <br>
                        <label class="date-edit">
                            <span>Start</span>
                            <input type="date" class="rounded-2" name="start_date">
                        </label>
                        <br>
                        <br>
                        <label class="date-edit">
                            <span> End </span>
                            <input type="date" class="rounded-2" name="end_date">
                        </label>
                        <!-- Error -->
                        @error('date')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Button --}}
                    <div class="mb-3 col-10 mx-auto">
                        <button type="submit"
                            class="btn post-button-kurenai btn-lg px-5 text-white btn-kurenai btn-kurenai:hover"
                            id="post-button">Post</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    @include('components.footer')
@endsection
