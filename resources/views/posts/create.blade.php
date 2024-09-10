@extends('layouts.app')

@section('title', 'New Post')

@section('content')
    <div class="container pt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                {{-- heading --}}
                <h2 class="heading-kurenai col-3"><span>New Post</span></h2>

                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- category --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="category" class="form-label d-block fw-bold">
                                Category
                            </label>
                            @foreach ($all_categories as $category)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="categories[]" id="{{ $category->name }}"
                                        value="{{ $category->id }}" class="form-check-input">

                                    <label for="{{ $category->name }}"
                                        class="form-check-label">{{ $category->name }}</label>
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
                            <textarea name="title" id="title" class="form-control">{{ old('title') }}</textarea>
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
                            <textarea name="article" id="article" rows="3" class="form-control">{{ old('article') }}</textarea>
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
                            <input type="file" name="image" id="image" class="form-control"
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
                            <textarea name="caption" id="caption" class="form-control">{{ old('caption') }}</textarea>
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
                            <label class="date-edit">
                                <input type="date" name="visit_date" class="rounded-2">
                            </label>
                            <!-- Error -->
                            @error('visit_date')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- Area of japan --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="Area of Japan" class="form-label fw-bold">Area of Japan</label>
                            <select class="form-select form-select-lg mb-3" name="area_id" id="area">
                                <option value="">Plese, Select area</option>
                                @foreach ($all_areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
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
                            <label for="prefecture_of_japan" class="form-label fw-bold">Prefecture of Japan</label>
                            {{-- <select class="form-select form-select-lg mb-3" name="prefecture_id" id="prefecture">
                                @foreach ($all_prefectures as $prefecture)
                                    <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                                @endforeach
                            </select> --}}
                            <select name="prefecture_id" id="prefecture_of_japan" class="form-select">
                                @foreach ($prefectures_by_area as $area => $prefectures)
                                    <optgroup label="{{ $area }}">
                                        @foreach ($prefectures as $prefecture)
                                            <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
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
                    {{-- Event --}}
                    <div class="row mb-4">
                        <div class="col mb-4">
                            <p class="form-label fw-bold m-0">Date of Event</p>
                            <div class="row">
                                <div class="col">
                                    <label for="start_date" class="date-edit">
                                        <span>Start</span>
                                    </label>
                                    <input type="date" class="rounded-2" id="start_date" name="start_date">
                                    <!-- Error -->
                                    @error('start_date')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="end_date" class="date-edit">
                                        <span> End </span>
                                    </label>
                                    <input type="date" class="rounded-2" id="end_date" name="end_date">
                                    <!-- Error -->
                                    @error('end_date')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="row">
                        <div class="col mb-4">
                            <label for="event-address" class="form-label fw-bold">Address</label>
                            <input type="text" name="event_address" id="event-address" class="form-control">{{ old('event_address') }}

                            <!-- Error -->
                            @error('event_address')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Button --}}
                    <div class="row">
                        <div class="mb-4 col-6 mx-auto d-grid gap-2">
                            {{-- <button type="submit"
                                class="btn post-button-kurenai btn-lg px-5 text-white btn-kurenai btn-kurenai:hover"
                                id="post-button">Post
                            </button> --}}
                            <button type="submit" class="btn btn-kurenai-pf btn-lg p-1 mb-2" id="post-button">
                                {{-- class="btn post-button-kurenai btn-lg px-5 text-white btn-kurenai btn-kurenai:hover" --}}
                                Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
