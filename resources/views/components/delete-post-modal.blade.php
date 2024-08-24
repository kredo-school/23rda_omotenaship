    {{-- User delete-post-modal --}}
    <div class="modal fade" id="delete-post-modal-{{ $post->id }}" aria-labelledby="delete-post-modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                    {{-- <form action="{{ url('/posts/'.$post->id.'/destroy') }}" method="post"> --}}
                    @csrf
                    @method('DELETE')

                    <div class="modal-header d-flex justify-content-center account-boder">
                        <h5 class="modal-title account-modal-title">Delete Post</h5>
                    </div>
                    <div class="modal-body text-center">
                        @if ($post->images->isNotEmpty())
                            @foreach ($post->images as $image)
                                <img src="{{ $image->image }}" class="posts-show-image w-100"
                                    alt="{{ $image->post_id }}">
                            @endforeach
                        @else
                            <p>No image available</p>
                        @endif
                        <h5 class="mt-3">{{ $post->title }}</h5>

                        <i class="fa-solid fa-triangle-exclamation icon-delete-account"></i>
                        <div>
                            <p class="account-modal-text mt-2">
                                Are you sure you want to delete this post?
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer account-boder d-flex justify-content-center">
                        <button type="button" class="btn border cancel-account-border"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn account-btn">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
