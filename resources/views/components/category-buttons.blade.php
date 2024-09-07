<div class="">
    {{-- Heading --}}
    <div class="row mb-4">
        <h5 class="text-center text-bold">
            <span class="px-2 heading-kurenai">Categories</span>
        </h5>
    </div>

    <div class="row mb-2">
        {{-- Volunteer --}}
        <div class="col d-flex justify-content-end pe-3">
            <a href="{{ route('posts.index', ['category' => 'volunteer']) }}" class="icon-container">
                <img src="{{ asset('images/categories/1.png') }}" class="img-fluid">
                <span class="hover-text">Volunteer</span>
            </a>
        </div>

        {{-- Event --}}
        <div class="col d-flex justify-content-start ps-4">
            <a href="{{ route('posts.index', ['category' => 'event']) }}" class="icon-container">
                <img src="{{ asset('images/categories/2.png') }}" class="img-fluid">
                <span class="hover-text">Event</span>
            </a>
        </div>
    </div>

    <div class="row mt-5">
        {{-- Review --}}
        <div class="col d-flex justify-content-end pe-3">
            <a href="{{ route('posts.index', ['category' => 'review']) }}" class="icon-container">
                <img src="{{ asset('images/categories/3.png') }}" class="img-fluid">
                <span class="hover-text">Review</span>
            </a>
        </div>

        {{-- Culture --}}
        <div class="col d-flex justify-content-start ps-3">
            <a href="{{ route('posts.index', ['category' => 'culture']) }}" class="icon-container">
                <img src="{{ asset('images/categories/4.png') }}" class="img-fluid">
                <span class="hover-text">Culture</span>
            </a>
        </div>
    </div>
</div>
