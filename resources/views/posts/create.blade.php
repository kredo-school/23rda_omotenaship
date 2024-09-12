@extends('layouts.app')

@section('title', 'New Post')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                {{-- heading --}}
                <h2 class="mb-3">
                    <span class="px-2 heading-kurenai mb-5">Create New Post</span>
                </h2>

                {{-- Post Type --}}
                <p class="">Post Type:
                    <span class="fw-bold">{{ $selected_category_name }}</span>
                </p>

                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- Slected Category ID --}}
                    <input type="hidden" name="categories[]" value="{{ $selected_category_id }}">

                    {{-- Title --}}
                    <div class="row">
                        <div class="col mb-4 w-100">
                            <label for="title" class="form-label fw-bold posts_input_box">Title</label>
                            <textarea name="title" id="title" class="form-control">{{ old('title') }}</textarea>

                            <!-- Error -->
                            @error('title')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Artical --}}
                    <div class="row">
                        <div class="col mb-4 w-100">
                            <label for="article" class="form-label fw-bold">Article</label>
                            <textarea name="article" id="article" rows="20" class="form-control">{{ old('article') }}</textarea>

                            <!-- Error -->
                            @error('article')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- images --}}
                    <div class="row">
                        <div class="col mb-4 w-100">
                            <label for="image" class="form-label fw-bold">Image</label>
                            <input type="file" name="image" id="image" class="form-control posts_input_box"
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

                    {{-- 5: Event Organizeer --}}
                    {{-- 6: Volunteer Organizeer --}}
                    @if ($selected_category_id !== '5' && $selected_category_id !== '6')
                        {{-- visit_Date --}}
                        <div class="row">
                            <div class="col mb-4 w-100">
                                <label for="Date of visit" class="form-label fw-bold">Date of visit</label>
                                <br>
                                <label class="visit_date w-100 posts_input_box">
                                    <input type="date" name="visit_date" class="form-control rounded-2">
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
                        <div class="col mb-4 w-100">
                            <label for="Prefecture of Japan" class="form-label fw-bold posts_input_box">Prefecture of
                                Japan</label>

                            <select name="prefecture_id" id="prefecture_id" class="form-select">
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

                    {{-- Address --}}
                    <div class="row">
                        <div class="col mb-4 w-100">
                            <label for="event-address" class="form-label fw-bold posts_input_box">Address</label>
                            <input type="text" name="event_address" id="event-address"
                                class="form-control">{{ old('event_address') }}

                            <!-- Error -->
                            @error('event_address')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- 1: Review --}}
                    {{-- 4: Culture --}}
                    @if ($selected_category_id !== '1' && $selected_category_id !== '4')
                        {{-- Date of Event --}}
                        <div class="row mb-4">
                            <div class="col mb-4 w-100">
                                <p class="form-label fw-bold m-0">Date of Event</p>
                                <div class="row">
                                    <div class="col">
                                        <label for="start_date">
                                            <span>Start</span>
                                        </label>
                                        <input type="date" class="rounded-2 form-control" id="start_date"
                                            name="start_date">

                                        <!-- Error -->
                                        @error('start_date')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label for="end_date">
                                            <span> End </span>
                                        </label>
                                        <input type="date" class="rounded-2 form-control" id="end_date" name="end_date">

                                        <!-- Error -->
                                        @error('end_date')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Button --}}
                    <div class="row">
                        <div class="mb-4 col mx-auto d-grid gap-2">
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
@endsection
