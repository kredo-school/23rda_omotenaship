<div class="card components-post">
    {{-- Top Image --}}
    <a href="{{ route('posts.show', ['id' => $post->id]) }}" draggable="false">
        @if ($post->images->isNotEmpty())
            @foreach ($post->images as $image)
                <img src="{{ $image->image }}" alt="{{ $image->post_id }}" class="img-fluid card-img-top" draggable="false">
            @endforeach
        @else
            <p>No image available</p>
        @endif
    </a>

    {{-- Card Body --}}
    <div class="card-body">
        <div class="row">
            <div class="col-10">
                <p class="mb-0 fs-5">{{ \Illuminate\Support\Str::limit($post->title, 15, '...') }}</p>
                <p class="mb-0">
                    @foreach ($post->postCategories as $post_category)
                        <span class="rounded-1 mr-2 border border-dark px-1">{{ $post_category->category->name }}</span>
                    @endforeach
                </p>
                <p>{{ $post->user->name }}</p>
            </div>

            <div class="col-2 d-flex">
                {{-- Like Button --}}
                @include('components.like')
            </div>
        </div>
    </div>
</div>
