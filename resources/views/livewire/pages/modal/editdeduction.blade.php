<div wire:ignore.self class="modal fade" id="editdeduction" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="editdeduction"><strong>Update Form</strong></text>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                <button type="button" class="btn-close" wire:click="cancel1()"></button>
                {{-- <a href="{{ route('view') }}">
                <button class="btn btn-default btn-close"></button>
                </a> --}}
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
                        <strong>Update</strong>
                    </div>

                    {{-- <div class="form-floating mb-3" >
                                    <input type="text" class="form-control" wire:model="uniqueID" placeholder="id">
                                    <label for="floatingInput">uniqueID</label>
                                </div> 
                                <div class="form-floating mb-3" >
                                    <input type="text" class="form-control" wire:model="id" placeholder="id">
                                    <label for="floatingInput">ID</label>
                                </div>  --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" wire:model="Date" placeholder="Date">
                        <label for="floatingInput">Date</label>
                        @error('Date') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" wire:model="Quarter" readonly>
                        <label for="floatingInput">Quarter</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" wire:model="PR_No" placeholder="P.R No.">
                        <label for="floatingInput">PR No./Payee </label>
                        @error('Payee or PR No.') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" wire:model="Title" placeholder="Title">
                        <label for="floatingInput">Title</label>
                        @error('Title') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" wire:model="Amount" placeholder="Amount">
                        <label for="floatingInput">Amount</label>
                        @error('Amount') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" wire:model="Status" placeholder="Status">
                        <label for="floatingInput">Status</label>
                        @error('Status') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button wire:click="update1()" class="btn btn-primary"
                    style="background-color: #206BC4; width: 150px;">Update</button>
            </div>
        </div>
    </div>
</div>
