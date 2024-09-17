@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="container mt-5">

        <div class="col-lg-10 mx-auto">
            {{-- Header --}}
            <div class="row text-center">
                <h2 class="mt-5 pt-5 mb-3">
                    Contact Information
                </h2>

                @if (session('success'))
                    <p>{{ session('success') }}</p>
                @else
                    <p>If you have any questions or issues regarding the site, please feel free to contact us.</p>
                    <p>The personal information you provide will only be used to respond to your inquiry</p>
                @endif
            </div>

            <form method="post" action="{{ route('contact.store') }}" class="mt-5">
                @csrf

                <!-- name -->
                <div class="row mb-3 d-flex justify-content-center">
                    <label for="name">Name</label>
                    <input type="text" class="form-control bg-transparent" id="name" name="name" required>
                </div>

                <!-- Email -->
                <div class="row mb-3 d-flex justify-content-center">
                    <label for="email">Email</label>
                    <input type="email" class="form-control bg-transparent" id="email" name="email" required>
                </div>

                <!-- Content -->
                <div class="row mb-3 d-flex justify-content-center">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="30" rows="5" class="form-control bg-transparent" required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="row mt-5 mb-5">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-kurenai w-100">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Icons --}}
    <img src="{{ asset('/images/logos/red5.png') }}" alt="red cat" class="contact-redcat">
@endsection
