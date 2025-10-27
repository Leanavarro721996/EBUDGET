<div wire:ignore.self class="modal fade" id="createnew" tabindex="-1" aria-labelledby="createnew" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <text class="modal-title" id="createnew"><strong>New Programs, Projects, and Activities</strong></text>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                {{-- <button type="button" class="btn-close" wire:click="cancel1()" ></button> --}}
            </div>
            <div class="modal-body">
                <diiv class="card">
                    <div class="card-header">
                        <strong>PPA Information</strong>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif

                        @if (session()->has('error'))
                        <div classs="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" wire:model="AIPRefCode" placeholder="AIPRefCode">
                            <label for="floatingInput">AIPRefCode</label>
                            @error('Aiprefcode') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" wire:model="ACCOUNT_CODE"
                                placeholder="Account Code">
                            <label for="floatingInput">Account Code</label>
                            @error('Accountcode') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" wire:model="Title" placeholder="Title">
                            <label for="floatingInput">Title</label>
                            @error('Title') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" wire:model="Department" placeholder="Department">
                            <label for="floatingInput">Department</label>
                            @error('Department') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" wire:model="Year" placeholder="Year">
                            <label for="floatingInput">Year</label>
                            @error('Year') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button wire:click.prevent="store()" class="btn btn-primary"
                            style="background-color: #206BC4; width: 150px;">Save</button>
                    </div>
            </div>
        </div>

    </div>
</div>
</div>
