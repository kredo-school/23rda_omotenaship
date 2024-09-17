    {{-- Admin delete-post-modal --}}
    <div class="modal fade" id="deletePostModal-{{ $post->id }}" aria-labelledby="delete-post-modal">
        <div class="modal-dialog modal-sm">
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                @csrf
                @method('DELETE')

                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center delete-border">
                        <h5 class="modal-title">Delete Post</h5>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ $post->images->first()->image }}" class="mx-auto admin-img">
                        <h5 class="mt-3">{{ $post->title }}</h5>

                        <i class="fa-solid fa-triangle-exclamation icon-delete-user"></i>
                        <div>
                            <p class="admin-modal-text mt-2">
                                Are you sure you want to delete this post?
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer delete-border d-flex justify-content-center">
                        <button type="button" class="btn border cancel-border" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn admin-btn">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
