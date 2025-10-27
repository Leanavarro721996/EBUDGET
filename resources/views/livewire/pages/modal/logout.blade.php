<div>
    <div wire:ignore.self class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body text-center">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button onclick="window.location.href='{{route('dashboard')}}'" type="button"
                        class="btn btn-secondary btn-sm">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button id="logoutButton" wire:click.prevent="logoutHandler()" type="button"
                        class="btn btn-danger btn-sm">
                        <i class="fas fa-sign-out-alt"></i> Confirm Log out
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
