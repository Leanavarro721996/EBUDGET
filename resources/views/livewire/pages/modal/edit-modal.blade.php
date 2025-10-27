<div wire:ignore.self class="modal fade" id="Edit_bud" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="Edit_bud"><strong> Programs, Projects, and Activities</strong></text>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                <a href="{{ route('budget') }}">
                    <button class="btn btn-default btn-close"></button>
                </a>
            </div>
            <div class="modal-body">
                <div class="card">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif

                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div class="card-header">
                        <strong>PPA Information</strong>
                    </div>
                    <div class="card-body">
                        <input type="hidden" wire:model="id">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" wire:model="AIPRefCode" placeholder="AIPRefCode">
                            <label for="floatingInput">AIPRefCode</label>
                            @error('AIPRefCode') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" wire:model="ACCOUNT_CODE"
                                placeholder="Account Code">
                            <label for="floatingInput">Account Code</label>
                            @error('ACCOUNT_CODE') <span class="text-danger">{{ $message }}</span>@enderror
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
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button wire:click="update()" class="btn btn-primary"
                    style="background-color: #206BC4; width: 150px;">Save</button>
            </div>
        </div>
    </div>
</div>
