<div class="card components-post">
    <img src="{{ asset('images/14.png') }}" class="img-fluid card-img-top">
    <form action="{{ route('favorites.store', $post_id) }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="post_id" value="{{ $post_id }}">
        <button type="submit" class="border-0 bg-transparent">
            <i class="fa-solid fa-star text-warning star-icon"></i>
        </button>
    </form>
    <div class="card-body">
        <div class="row">
            <div class="col-10">
                <p class="mb-0 fs-5">title flower garden</p>
                <p class="mb-0"><span class="rounded-1 mr-2 border border-dark px-1">Review</span><span class="rounded-1 mr-2 border border-dark px-1">Event</span><span class="rounded-1 mr-2 border border-dark px-1">Volunteer</span><span class="rounded-1 mr-2 border border-dark px-1">Culture</span></p>
                <p>Username</p>
            </div>
            <div class="col-2 mt-4 pt-3">
                <img src="{{ asset('images/10.png') }}" alt="Icon Image">
            </div>
        </div>
    </div>
</div>
