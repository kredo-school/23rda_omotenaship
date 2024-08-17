@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

    @include('components.navbar')
    <div class="row justify-content-center">
        <div class="col-8 mt-5 justify-content-center">

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
                            <img src="{{ asset('images\profile_sample1.png') }}" alt=""
                                class="mx-auto d-flex justify-content-center align-self-stretch abatar-pf-edit">
                        </div>
                        {{-- Abatar Upload --}}
                        <div class="m-0 col-auto align-self-start">
                            <input type="file" name="avatar" id="avatar" class="form-control form-control-sm mt-1"
                                aria-describedby="avatar-info">
                            <div class="form-text" id="avatar-info">
                                <p class="mb-0">
                                    Acceptable formats are jpeg, jpg, png and gif only.
                                </p>
                                <p class="mt-0">
                                    Maximum file size is 1048kb.
                                </p>
                            </div>
                            <!-- Error  -->
                        </div>
                    </div>


                    {{-- Profile Entry Form --}}
                    <div class="col-md-6 col-12 my-3 px-3 justify-content-center">
                        {{-- Name --}}
                        <div class="row">
                            {{-- First name --}}
                            <div class="mb-3">
                                <label for="name" 
                                class="form-label fw-bold mb-0">
                                    <h6>
                                        First name
                                    </h6>
                                </label>
                                <input type="text" name="name" id="name" 
                                class="form-control form-siz-pf" autofocus
                                    placeholder="First name">
                            </div>
                            {{-- Midle name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold mb-0">
                                    <h6>
                                        Midle name
                                    </h6>
                                </label>
                                <input type="text" name="name" id="name" 
                                class="form-control form-siz-pf" autofocus
                                    placeholder="Midle name">
                            </div>
                            {{-- Last name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold mb-0">
                                    <h6>
                                        Last name
                                    </h6>
                                </label>
                                <input type="text" name="name" id="name" 
                                class="form-control form-siz-pf" autofocus
                                    placeholder="Last name">
                            </div>
                        </div>
                        {{-- Date of Birth --}}
                        <div class="mb-3">
                            <label for="datepicker" class="form-label fw-bold  mb-0">
                                <h6>
                                    Date of Birth
                                </h6>
                            </label>
                            <input type="date" name="datepicker" id="datepicker" 
                            class="form-control form-siz-pf" autofocus
                                placeholder="YYYY/MM/DD">{{ old('datepicker') }}
                        </div>
                        {{-- Language --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold mb-0">
                                <h6>
                                    Language
                                </h6>
                            </label>
                            <select id="language-select" name="languages" 
                            class="form-control form-siz-pf"
                                onchange="changeLanguage()">{{ old('language-select') }}
                                <option value="en">English</option>
                                <option value="ja">Japanese</option>
                                <option value="fr">French</option>
                                <option value="de">German</option>
                                <option value="zh">Chinese</option>
                                <option value="ko">Korean</option>
                            </select>

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
                        placeholder="Describe yourself">{{ old('introduction') }}</textarea>
                    <!-- Error -->
                    @error('introduction')
                        <p class="text-danger small">message{{-- {{ $message }} --}}</p>
                    @enderror
                </div>

                {{-- Update Button --}}
                <div class="mt-1 mb-5 d-flex flex-column justify-content-center align-items-end">
                    <a href=# class="btn btn-kurenai btn-lg px-5 w-100">
                        Update profile
                    </a>
                </div>

            </div>
        </div>
    </div>
    @include('components.footer')
@endsection
