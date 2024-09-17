{{-- delete-NG Word-modal --}}
<div class="modal fade" id="deleteNGWordModal-{{ $ng_word->id }}" aria-labelledby="delete-ngword-modal">
    <div class="modal-dialog modal-sm">
        <form action="{{ route('admin.ngwords.destroy', $ng_word->id) }}" method="post">
            @csrf
            @method('DELETE')

            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title">Delete NG Word</h5>
                </div>
                <div class="modal-body text-center">
                    <i class="fa-solid fa-triangle-exclamation icon-delete-user"></i>
                    <div>
                        <p class="admin-modal-text mt-2">
                            Are you sure you want to delete "{{ $ng_word->word }}"?
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

