{{-- Delete Acount --}}
<div class="modal fade" id="deleteAccountModal-{{ $profile->user->id }}" aria-labelledby="delete-user-modal">
    <div class="modal-dialog modal-sm">
        <form action="{{ route('profiles.destroy', $profile->id) }}" method="post">
            @csrf
            @method('DELETE')

            <div class="modal-content ">
                <div class="modal-header account-boder d-flex justify-content-center">
                    <h5 class="modal-title account-modal-title">Delete Account</h5>
                </div>
                <div class="modal-body text-center">
                    @if ($profile->avatar)
                        <img src="{{ $profile->avatar }}" class="rounded-circle mx-auto admin-img">
                    @else
                        <img src="{{ asset('images\profile_sample1.png') }}" alt=""
                            class="mx-auto d-flex justify-content-center align-items-center abatar-pf-edit">
                    @endif

                    <h5 class="mt-3">
                        {{ $profile->first_name }}&nbsp;{{ $profile->last_name }}&nbsp;{{ $profile->middle_name }}</h5>

                    <i class="fa-solid fa-triangle-exclamation icon-delete-account"></i>
                    <div>
                        <p class="account-modal-text mt-2">
                            Are you sure you want to delete this account?
                        </p>
                    </div>
                </div>
                <div class="modal-footer account-boder d-flex justify-content-center">
                    <button type="button" class="btn border cancel-account-border"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn account-btn">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
