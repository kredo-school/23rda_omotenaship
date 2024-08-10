@if('true')
{{--Admin delete-post-modal --}}
<div class="modal fade" id="deletePostModal" aria-labelledby="delete-post-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center delete-border">
                <h5 class="modal-title">Delete Post</h5>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('images/sample3.jpg')}}" class="mx-auto admin-img">
                <h5 class="mt-3">Title</h5>
                
                    <i class="fa-solid fa-triangle-exclamation icon-delete-user"></i>
                <div>
                    <p class="admin-modal-text mt-2">
                        Are you sure you want to delete this post?
                    </p>
                </div>
            </div>
            <div class="modal-footer delete-border d-flex justify-content-center">
                <button type="button" class="btn border cancel-border" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn admin-btn">Delete</button>
            </div>
        </div>
    </div>
</div>

@elseif('false')
{{--User delete-post-modal --}}
<div class="modal fade" id="deletePostModal" aria-labelledby="delete-post-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center account-boder">
                <h5 class="modal-title account-modal-title">Delete Post</h5>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('images/sample3.jpg')}}" class="mx-auto admin-img">
                <h5 class="mt-3">Title</h5>
                
                    <i class="fa-solid fa-triangle-exclamation icon-delete-account"></i>
                <div>
                    <p class="account-modal-text mt-2">
                        Are you sure you want to delete this post?
                    </p>
                </div>
            </div>
            <div class="modal-footer account-boder d-flex justify-content-center">
                <button type="button" class="btn border cancel-account-border" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn account-btn">Delete</button>
            </div>
        </div>
    </div>
</div>
@endif