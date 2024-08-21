<div class="card components-post">
    {{-- Image --}}
    @if ($post->images->isNotEmpty())
        @foreach ($post->images as $image)
            <img src="{{ $image->image }}" alt="{{ $image->post_id }}" class="img-fluid card-img-top">
        @endforeach
    @else
        <p>No image available</p>
    @endif

    {{-- Favorites Button --}}
    
    {{-- @if (Auth::check())
        @if ($post->isFavorited())
            <form action="{{ route('favorite.destroy', $post->id) }}" method="post" class="star-icon">
                @csrf
                @method('DELETE')
                <button type="submit" class="border-0 bg-transparent">
                    <i class="fa-solid fa-star text-warning star-icon fa-2x"></i>
                </button>
            </form>
        @else
            <form action="{{ route('favorite.store', $post->id) }}" method="post">
                @csrf
                <button type="submit" class="border-0 bg-transparent star-icon">
                    <i class="fa-regular fa-star star-icon fa-2x"></i>
                </button>
            </form>
        @endif
    @else
        <!-- ユーザーがログインしていない場合 -->
        <button class="border-0 bg-transparent star-icon" onclick="alert('Please Login');">
            <i class="fa-regular fa-star fa-2x"></i>
        </button>
    @endif --}}
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
                <i class="fa-solid fa-heart text-danger fa-2x"></i>
            </div>
        </div>
    </div>
</div>
