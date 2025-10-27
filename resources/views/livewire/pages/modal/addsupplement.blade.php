<style>
    .form-control {
        height: 50px;
        /* Adjust the height as needed */
    }

</style>
<div wire:ignore.self class="modal fade" id="addsupplement" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="addsupplement"><strong>Supplemental</strong></text>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                <button type="button" class="btn-close" wire:click="cancel1()"></button>

            </div>
            <!-- ALERT MESSAGE-->
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
                        <strong>Add Supplemental</strong>
                    </div>
                    <!-- BODY -->
                    <div class="card-body">
                        <div class="container">
                            <form class="row gx-3 gy-2 align-items-center">
                                <div class="form-floating mb-3" style="display: none;">
                                    <input type="text" class="form-control" wire:model="id" placeholder="category_id">
                                    <label for="floatingInput">category_id</label>
                                    {{-- @error('category_id') <span class="text-danger">{{ $message }}</span>@enderror
                                    --}}
                                </div>
                                <div class="form-floating mb-3" style="display: none;">
                                    <input type="text" class="form-control" wire:model="PPA" placeholder="category_id">
                                    <label for="floatingInput">PPA</label>
                                    {{-- @error('category_id') <span class="text-danger">{{ $message }}</span>@enderror
                                    --}}
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="name" placeholder="Name">
                                    <label for="floatingInput">Name</label>
                                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-3" style="display: none;">
                                    <input type="number" class="form-control" wire:model="amount" placeholder="amount">
                                    <label for="floatingInput">Amount</label>
                                    {{-- @error('amount') <span class="text-danger">{{ $message }}</span>@enderror --}}
                                </div>
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="FIRST1"
                                        placeholder="1st Quarter">
                                    @error('FIRST') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <!-- 2nd Quarter -->
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="SECOND2"
                                        placeholder="2nd Quarter">
                                    @error('SECOND') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <!-- 3rd Quarter -->
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="THIRD3"
                                        placeholder="3rd Quarter">
                                    @error('THIRD') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <!-- 4th Quarter -->
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="FOURTH4"
                                        placeholder="4th Quarter">
                                    @error('FOURTH') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button wire:click="storedata()" class="btn btn-primary"
                    style="background-color: #206BC4; width: 150px;">Save</button>
            </div>
        </div>
    </div>
</div>
