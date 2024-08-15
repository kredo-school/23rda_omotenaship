{{-- delete-modal --}}
<div class="modal fade" id="deleteUserModal" aria-labelledby="delete-user-modal">
    <div class="modal-dialog modal-sm">
        <form action="{{ route('admin.users.destroy', $profile->id) }}" method="post">
            @csrf
            @method('DELETE')

            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title">Delete User</h5>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('images/usersample2.jpg') }}" class="rounded-circle mx-auto admin-img">
                    <h5 class="mt-3">User Name</h5>

                    <i class="fa-solid fa-triangle-exclamation icon-delete-user"></i>
                    <div>
                        <p class="admin-modal-text mt-2">
                            Are you sure you want to delete this user?
                        </p>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn border cancel-border" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn admin-btn">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
