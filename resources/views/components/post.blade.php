<div class="card components-post">
    @if ($post->images->isNotEmpty())
        @foreach ($post->images as $image)
            <img src="{{ $image->image }}" alt="{{ $image->post_id }}" class="img-fluid card-img-top">
        @endforeach
    @else
        <p>No image available</p>
    @endif

    {{-- Favorites Button --}}
    {{-- <form action="{{ route('favorites.store') }}" method="POST">
        @csrf --}}
        {{-- <input type="hidden" name="user_id" value=2>
        <input type="hidden" name="post_id" value=1> --}}
        {{-- <button type="submit" class="border-0 bg-transparent">
            <i class="fa-solid fa-star  star-icon"></i>
        </button> --}}
    </form>
    <div class="card-body">
        <div class="row">
            <div class="col-10">
                <p class="mb-0 fs-5">{{ \Illuminate\Support\Str::limit($post->title, 25, '...') }}</p>
                <p class="mb-0">
                    @foreach ($post->postCategories as $post_category)
                        <span class="rounded-1 mr-2 border border-dark px-1">{{ $post_category->category->name }}</span>
                    @endforeach
                </p>

                <p>{{ $post->user->name }}</p>
            </div>
            <div class="col-2 pt-4 text-end">
                <i class="fa-solid fa-heart text-danger"></i>
            </div>
        </div>
    </div>
</div>
