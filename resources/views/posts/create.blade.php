@extends('layouts.app')

@section('title', 'New Post')

@section('content')
    {{-- @include('components.navbar') --}}
    <div class="container custom-container">
        <div class="row justify-content-center d-flex">
            <div class="col-8 mx-auto">
                <div class="row">
                    <h2 class="heading-kurenai"><span>New Post</span></h2>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- category --}}
                    <div class="row">
                        <div class="col-8 mb-4">
                            <label for="category" class="form-label d-block fw-bold">
                                Category
                            </label>
                            {{-- @foreach ($all_categories as $category) --}}
                            <div class="form-check form-check-inline">
                                {{-- <input type="checkbox" name="categories[]" id="{{ $category->name }}"
                                        value="{{ $category->id }}" class="form-check-input">

                                    <label for="{{ $category->name }}"
                                        class="form-check-label">{{ $category->name }}</label> --}}
                            </div>
                            {{-- @endforeach --}}
                            <!-- Error -->
                            @error('catogory')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- title --}}
                    <div class="row">
                        <div class="col-8 mb-4">
                            <label for="title" class="form-label fw-bold">Title</label>
                            <textarea name="title" id="title" class="form-control">{{ old('title') }}</textarea>
                            <!-- Error -->
                            @error('title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- artical --}}
                    <div class="row">
                        <div class="col-8 mb-4">
                            <label for="article" class="form-label fw-bold">Article</label>
                            <textarea name="article" id="article" rows="3" class="form-control">{{ old('article') }}</textarea>
                            <!-- Error -->
                            @error('article')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- images --}}
                    <div class="row">
                        <div class="col-8 mb-4">
                            <label for="image" class="form-label fw-bold">Image</label>
                            <input type="file" name="image" id="image" class="form-control"
                                aria-describedby="image-info">
                            <div class="form-text" id="image-info">
                                <p class="mb-0">The acceptable formats are jpeg, jpg, png and gif only.</p>
                                <p class="mb-0">Maximum file size is 1048kb.</p>
                            </div>
                            @error('image')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- caption --}}
                        <div class="col-8 mb-4">
                            <label for="caption" class="form-label fw-bold">Caption</label>
                            <textarea name="caption" id="caption" class="form-control">{{ old('caption') }}</textarea>
                            <!-- Error -->
                            @error('caption')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- Date --}}
                    <div class="row">
                        <div class="col-8 mb-4">
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
                    </div>
                    {{-- Area of japan --}}
                    <div class="row">
                        <div class="col-8 mb-4">
                            <label for="Area of Japan" class="form-label fw-bold">Area of Japan</label>
                            <select class="form-select form-select-lg mb-3" name="area_id" id="area">
                                {{-- @foreach ($all_areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach --}}
                            </select>

                            <!-- Error -->
                            @error('date')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- prefecture --}}
                    <div class="row">
                        <div class="col-8 mb-4">
                            <label for="Prefecture of Japan" class="form-label fw-bold">Prefecture of Japan</label>
                            <select class="form-select form-select-lg mb-3" name="prefecture_id" id="prefecture">
                                {{-- @foreach ($all_prefectures as $prefecture)
                                        <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                                    @endforeach --}}
                            </select>

                            <!-- Error -->
                            @error('date')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- Event --}}
                    <div class="row">
                        <div class="col-8 mb-4">
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
                    </div>

                    {{-- Button --}}
                    <div class="row">
                        <div class="mb-4 col-4">
                            <button type="submit"
                                class="btn post-button-kurenai btn-lg px-5 text-white btn-kurenai btn-kurenai:hover"
                                id="post-button">Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- @include('components.footer') --}}
@endsection
