    {{-- Admin delete-inquire-modal --}}
    <div class="modal fade" id="deleteInquireModal-{{ $inquire->id }}" aria-labelledby="delete-inquire-modal">
        <div class="modal-dialog modal-sm">
            <form action="{{ route('admin.inquires.destroy', $inquire->id) }}" method="post">
                @csrf
                @method('DELETE')

                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center delete-border">
                        <h5 class="modal-title">Delete Contact</h5>
                    </div>
                    <div class="modal-body text-center">
                        <h5 class="mt-3">{{ $inquire->name }}</h5>

                        <i class="fa-solid fa-triangle-exclamation icon-delete-user"></i>
                        <div>
                            <p class="admin-modal-text mt-2">
                                Are you sure you want to delete this contact?
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
