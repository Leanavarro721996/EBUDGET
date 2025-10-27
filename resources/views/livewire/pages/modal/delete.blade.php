<div wire:ignore.self class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="delete"><strong>Less Supplemental</strong></text>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                <button type="button" class="btn-close" wire:click="cancel1()"></button>
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
                        <strong>Less Supplemental</strong>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <form class="row gx-3 gy-2 align-items-center">
                                <div class="form-floating mb-3" style="display: none;">
                                    <input type="text" class="form-control" wire:model="id" placeholder="id">
                                    <label for="floatingInput">id</label>
                                    {{-- @error('category_id') <span class="text-danger">{{ $message }}</span>@enderror
                                    --}}
                                </div>
                                <div class="form-floating mb-3" style="display: none;">
                                    <input type="text" class="form-control" wire:model="category_id"
                                        placeholder="category_id">
                                    <label for="floatingInput">category_id</label>
                                    {{-- @error('category_id') <span class="text-danger">{{ $message }}</span>@enderror
                                    --}}
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="name" placeholder="Name"
                                        readonly>
                                </div>
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="amount" placeholder="amount"
                                        readonly>
                                    @error('amount') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-auto">
                                    <div class="text">
                                        <label class="form-check-label">
                                            Less
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" wire:model="less1" placeholder="0">
                                    @error('Amount') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button wire:click="Lesssupp()" class="btn btn-primary"
                    style="background-color: #206BC4; width: 150px;">Less</button>
            </div>
        </div>
    </div>
</div>
