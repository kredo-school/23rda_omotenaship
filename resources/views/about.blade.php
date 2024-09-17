@extends('layouts.app')

@section('title', 'About')

@section('content')
    <div class="container-fluid col-lg-9">

        <div>
            <img src="{{ asset('images/manekineko.png') }}" alt="manekineko" class="manekineko">
        </div>

        <div class="justify-content-cneter text-center mx-5 mt-5 mb-5">
            <h1>About</h1>

            <p>
                Welcome to "Omotenaship", a review-based tourism guide website where foreign tourists can discover and share
                Japan's hidden gems. We aim to introduce not only the major tourist spots but also the smaller, lesser-known
                attractions and cultural experiences known by locals, bringing travelers closer to the undiscovered beauty
                of Japan.
                Users can post reviews of places they've visited or experiences they've had during their travels, providing
                authentic, helpful insights for fellow travelers. The website also offers an easy-to-use interface for
                searching tourist attractions, events, and cultural spots by region using a map.
                We value the spirit of "Omotenashi" (hospitality) and strive to help tourists have the best possible
                experience in every corner of Japan. Through this site, we hope you'll discover the hidden charms of Japan
                and make your journey truly special.
            </p>
        </div>
    </div>
@endsection
