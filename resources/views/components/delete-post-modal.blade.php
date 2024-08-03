{{-- delete-post-modal --}}
<div class="modal fade" id="deleteUserModal" aria-labelledby="delete-user-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header  d-flex justify-content-center">
                <h5 class="modal-title">Delete Post</h5>
            </div>
            <div class="modal-body text-center">
                <img src="https://images.pexels.com/photos/1023953/pexels-photo-1023953.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="mx-auto admin-img">
                <h5 class="mt-3">Title</h5>
                
                    <i class="fa-solid fa-triangle-exclamation icon-delete-user"></i>
                <div>
                    <p class="admin-modal-text mt-2">
                        Are you sure you want to delete this post?
                    </p>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn border cancel-border" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn admin-btn">Delete</button>
            </div>
        </div>
    </div>
</div>