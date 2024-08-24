@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

    @include('components.navbar')
    <div class="row justify-content-center">
        <div class="col-8 mt-5 justify-content-center">
            <form action="{{ route('profiles.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- Edit Profile --}}
                <div class="section-header">
                    <h2>
                        <span class="px-2 heading-kurenai">
                            Edit Profile
                        </span>
                    </h2>
                </div>

                {{-- Abatar&Profile&Introduction&Button --}}
                <div class="row justify-content-center">

                    {{-- Abatar&Profile --}}
                    <div class="row justify-content-center align-self-start">
                        {{-- Abatar --}}
                        <div class="col-md-6 col-12 my-3 px-3 justify-content-center">
                            {{-- Avatar Display --}}
                            <div>
                                @if ($profile->avatar)
                                    <img src="{{ $profile->avatar }}" alt="{{ $profile->avatar }}"
                                        class="mx-auto d-flex justify-content-center align-items-center abatar-pf-show">
                                @else
                                    <img src="{{ asset('images\profile_sample1.png') }}" alt=""
                                        class="mx-auto d-flex justify-content-center align-items-center abatar-pf-show">
                                @endif
                            </div>
                            {{-- Abatar Upload --}}
                            <div class="m-0 col-auto align-self-start">
                                <input type="file" name="avatar" id="avatar"
                                    class="form-control form-control-sm mt-1" 
                                    aria-describedby="avatar-info">
                                <div class="form-text" id="avatar-info">
                                    <p class="mb-0">
                                        Acceptable formats are jpeg, jpg, png and gif only.
                                    </p>
                                    <p class="mt-0">
                                        Maximum file size is 1048kb.
                                    </p>
                                </div>
                                <!-- Error -->
                                @error('avatar')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        {{-- Profile Entry Form --}}
                        <div class="col-md-6 col-12 my-3 px-3 justify-content-center">
                            <div class="row">

                                {{-- First name --}}
                                <div class="mb-3">
                                    <label for="first_name" class="form-label fw-bold mb-0">
                                        <h6>
                                            First name
                                        </h6>
                                    </label>
                                    <input type="text" name="first_name" id="first_name" 
                                        class="form-control form-siz-pf"
                                        autofocus placeholder="First name" 
                                        value="{{ old('first_name',$profile->first_name) }}">
                                    <!-- Error -->
                                    @error('first_name')
                                        <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Midle name --}}
                                <div class="mb-3">
                                    <label for="middle_name" class="form-label fw-bold mb-0">
                                        <h6>
                                            Midle name
                                        </h6>
                                    </label>
                                    <input type="text" name="middle_name" id="middle_name" 
                                        class="form-control form-siz-pf"
                                        autofocus placeholder="Midle name" 
                                        value="{{ old('middle_name',$profile->middle_name) }}">
                                    <!-- Error -->
                                    @error('middle_name')
                                        <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Last name --}}
                                <div class="mb-3">
                                    <label for="last_name" class="form-label fw-bold mb-0">
                                        <h6>
                                            Last name
                                        </h6>
                                    </label>
                                    <input type="text" name="last_name" id="last_name" 
                                        class="form-control form-siz-pf"
                                        autofocus placeholder="Last name" 
                                        value="{{ old('last_name',$profile->last_name )}}">
                                    <!-- Error -->
                                    @error('last_name')
                                        <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Date of Birth --}}
                            <div class="mb-3">
                                <label for="birth_date" class="form-label fw-bold  mb-0">
                                    <h6>
                                        Date of Birth
                                    </h6>
                                </label>
                                <input type="date" name="birth_date" id="birth_date" 
                                    class="form-control form-siz-pf"
                                    autofocus placeholder="YYYY/MM/DD" 
                                    value={{ old('birth_date',$profile->birth_date) }}>
                                <!-- Error -->
                                @error('birth_date')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Language --}}
                            <div class="mb-3">
                                <label for="language" class="form-label fw-bold mb-0">
                                    <h6>
                                        Language
                                    </h6>
                                </label>
                                <select name="language" id="language"  
                                    class="form-control form-siz-pf"
                                    value={{ old('language',$profile->language) }} 
                                    onchange="changeLanguage()">{{ $profile->language }}
                                    <option value="en">English</option>
                                    <option value="ja">Japanese</option>
                                    <option value="fr">French</option>
                                    <option value="de">German</option>
                                    <option value="zh">Chinese</option>
                                    <option value="ko">Korean</option>
                                </select>
                                <!-- Error -->
                                @error('language')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Introduction --}}
                    <div class="row mb-3 justify-content-start align-self-end">
                        {{-- Introduction -Title --}}
                        <label for="introduction" class="form-label fw-bold">
                            <h6>Introduction</h6>
                        </label>
                        {{-- Introduction -Text --}}
                        <textarea name="introduction" id="introduction" rows="5" class="form-control mx-auto"
                            placeholder="Describe yourself">{{ $profile->introduction }}</textarea>
                        <!-- Error -->
                        @error('introduction')
                            <p class="text-danger small">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Update Button --}}
                    <div class="mt-1 mb-5 d-flex flex-column justify-content-center align-items-end">
                        <button type="submit" class="btn btn-kurenai btn-lg px-5 w-100">
                            Update profile
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    @include('components.footer')
@endsection
