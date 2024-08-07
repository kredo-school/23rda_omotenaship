{{-- Delete Acount --}}
<div class="modal fade" id="deleteUserModal" aria-labelledby="delete-user-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header account-boder d-flex justify-content-center">
                <h5 class="modal-title account-modal-title">Delete Account</h5>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('images/usersample1.jpg')}}" class="rounded-circle mx-auto img-pf-edit">
                <h5 class="mt-3">User Name</h5>
                
                    <i class="fa-solid fa-triangle-exclamation icon-delete-account"></i>
                <div>
                    <p class="account-modal-text mt-2">
                        Are you sure you want to delete this account?
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