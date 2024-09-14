@extends('layouts.app')

@section('title', 'Contact')

@section('content')
    <div class="card border-0 col-lg-12 mt-3 d-flex align-items-center justify-content-center">
        <img src="{{ asset('images/logos/red5.png') }}" alt="redcat" class="contact-redcat img-fluid">

        <div class="card-img-overlay">
            <div class="text-center">
                <h2 class="mt-5 pt-5 mb-3">Contact Information</h2>
                <p>If you have any questions or issues regarding the site, please feel free to contact us.</p>
                <p>The personal information you provide will only be used to respond to your inquiry</p>
            </div>

            <form method="POST" action="#" class="mt-5">
                @csrf

                <!-- name -->
                <div class="row mb-3 d-flex justify-content-center">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control bg-transparent" id="name" name="name" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="row mb-3 d-flex justify-content-center">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control bg-transparent" id="email" name="email" required>
                    </div>
                </div>

                <!-- Content -->
                <div class="row mb-3 d-flex justify-content-center">
                    <div class="col-md-6">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" cols="30" rows="5" class="form-control bg-transparent" required></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row mt-5">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-kurenai w-25">
                            Submit
                        </button>
                    </div>
                </div>
            </form>

            <div id="successMessage" class="alert alert-success" style="display: none;">
                Thank you for contacting us! We will get back to you soon.
            </div>
        </div>
    </div>
@endsection
