<div class="card components-post">
    {{-- Image --}}
    {{-- @auth --}}
    <a href="{{ route('posts.show', ['id' => $post->id]) }}">
        @if ($post->images->isNotEmpty())
            @foreach ($post->images as $image)
                <img src="{{ $image->image }}" alt="{{ $image->post_id }}" class="img-fluid card-img-top">
            @endforeach
        @else
            <p>No image available</p>
        @endif
    </a>
    {{-- @else
        {{-- <a href="{{ route('login') }}"> --}}
    {{-- <a href="{{ route('posts.show', ['id' => $post->id]) }}"> --}}
    {{-- @if ($post->images->isNotEmpty()) --}}
    {{-- @foreach ($post->images as $image) --}}
    {{-- <img src="{{ $image->image }}" alt="{{ $image->post_id }}" class="img-fluid card-img-top"> --}}
    {{-- @endforeach --}}
    {{-- @else --}}
    {{-- <p>No image available</p> --}}
    {{-- @endif --}}
    {{-- </a> --}}
    {{-- @endauth --}}

    </form>
    <div class="card-body">
        <div class="row">
            <div class="col-10">
                <p class="mb-0 fs-5">{{ \Illuminate\Support\Str::limit($post->title, 20, '...') }}</p>
                <p class="mb-0">
                    @foreach ($post->postCategories as $post_category)
                        <span class="rounded-1 mr-2 border border-dark px-1">{{ $post_category->category->name }}</span>
                    @endforeach
                </p>

                <p>{{ $post->user->name }}</p>
            </div>
            <div class="col-1 pt-4 px-0 text-end">
                @if (Auth::check())
                    @if ($post->isLiked())
                        <form action="{{ route('likes.destroy', ['post_id' => $post->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm p-0">
                                <i class="fa-solid fa-heart text-danger fa-2x"></i>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('likes.store', ['post_id' => $post->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm shadow-none p-0">
                                <i class="fa-regular fa-heart fa-2x"></i>
                            </button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-decoration-none">
                        <button type="submit" class="btn btn-sm shadow-none p-0" onclick="alert('Please Login');">
                            @if ($post->likes->count() > 0)
                                <i class="fa-solid fa-heart text-danger fa-2x"></i>
                            @else
                                <i class="fa-regular fa-heart fa-2x"></i>
                            @endif
                        </button>
                    </a>
                @endif
            </div>
            <div class="col-1 pt-4 px-1">
                @if ($post->likes->count() > 0)
                    <span>{{ $post->likes->count() }}</span>
                @endif
            </div>
        </div>
    </div>
</div>