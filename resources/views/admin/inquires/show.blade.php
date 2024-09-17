@extends('layouts.app')

@section('title', 'Adimin Inquires Show')

@section('content')
<div class="cotainer-fluid">
    <div class="card border-0 col-lg-12 mt-3 d-flex align-items-center justify-content-center">
        <img src="{{ asset('images/logos/blue5.png') }}" alt="redcat" class="contact-redcat img-fluid">

        <div class="card-img-overlay">
            <div class="text-center">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <h2 class="mt-5 pt-5 mb-3">Contact Information</h2>
                    </div>
                </div>
            </div>

            <form method="post" action="{{ route('admin.inquires.update', $inquire->id) }}" class="mt-5">
                @csrf
                @method('PATCH')

                <!-- name -->
                <div class="row mb-3 d-flex justify-content-center">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control bg-transparent" id="name" name="name" value="{{ old('name', $inquire->name) }}" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="row mb-3 d-flex justify-content-center">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control bg-transparent" id="email" name="email" value="{{ old('email', $inquire->email) }}" required>
                    </div>
                </div>

                <!-- Content -->
                <div class="row mb-3 d-flex justify-content-center">
                    <div class="col-md-6">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" cols="30" rows="5" class="form-control bg-transparent" required>{{ old('content', $inquire->content) }}</textarea>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection