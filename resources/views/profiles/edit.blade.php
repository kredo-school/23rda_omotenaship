@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{ route('profile.update') }}" method="post" class="bg-white shadow rounded-3 p-5"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <h2 class="h3 mb-3 fw-light text-muted">
                    Edit Profile
                </h2>

                <div class="row mb-3">
                    <div class="col-4">
                        <img src="" alt="" class="rounded-circle shadow p-1 avatar-lg d-block mx-auto">
                        <i class="fa-solid fa-circle-user text-secondary icon-lg"></i>
                        <div class="col-auto align-self-end">
                            <input type="file" name="avatar" id="avatar" class="form-control form-control-sm mt-1"
                                aria-describedby="avatar-info">

                            <div class="form-text" id="avatar-info">
                                <p class="mb-0">Acceptable formats are jpeg, jpg, png and gif only.</p>
                                <p class="mt-0">Maximum file size is 1048kb.</p>
                            </div>
                            <!-- Error -->
                            @error('avatar')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">
                            Name
                        </label>
                        <input type="text" name="name" id="name" class="form-control" autofocus>
                        <!-- Error -->
                        @error('name')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">
                            E-mail Address
                        </label>
                        <input type="email" name="email" id="email" class="form-control">
                        <!-- Error -->
                        @error('email')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="introduction" class="form-label fw-bold">Introduction</label>
                        <textarea name="introduction" id="introduction" rows="5" class="form-control" placeholder="Describe yourself">{{ old('introduction') }}</textarea>
                        <!-- Error -->
                        @error('introduction')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn bg-kurenai btn-lg text-white px-5 w-100">Save</button>
            </form>
        </div>
    </div>
@endsection
