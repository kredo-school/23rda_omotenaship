<div class="d-flex">
    {{-- Like button --}}
    @if (Auth::check())
        {{-- Authorized user --}}
        @if ($post->isLiked())
            <button class="btn btn-sm p-0" id="like-button-{{ $post->id }}" data-post-id="{{ $post->id }}">
                <i class="fa-solid fa-heart text-danger fa-2x" id="like-icon-{{ $post->id }}"></i>
            </button>
        @else
            <button class="btn btn-sm p-0" id="like-button-{{ $post->id }}" data-post-id="{{ $post->id }}">
                <i class="fa-regular fa-heart fa-2x" id="like-icon-{{ $post->id }}"></i>
            </button>
        @endif
    @else
        {{-- Unauthorized User --}}
        <a href="{{ route('login') }}" class="text-decoration-none">
            <button class="btn btn-sm shadow-none p-0" onclick="alert('Please Login');">
                @if ($post->likes->count() > 0)
                    <i class="fa-solid fa-heart text-danger fa-2x"></i>
                @else
                    <i class="fa-regular fa-heart fa-2x"></i>
                @endif
            </button>
        </a>
    @endif

    {{-- Like count --}}
    @if ($post->likes->count() > 0)
        <div class="d-flex align-items-center ms-1" id="like-count-{{ $post->id }}">
            {{ $post->likes->count() }}
        </div>
    @elseif ($post->likes->count() === 0)
        <div class="d-flex align-items-center ms-1 text-white" id="like-count-{{ $post->id }}">
            {{ $post->likes->count() }}
        </div>
    @endif
</div>
