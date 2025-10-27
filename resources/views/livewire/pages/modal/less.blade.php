<style>
    .form-control {
        height: 50px;
        /* Adjust the height as needed */
    }

</style>

<div wire:ignore.self class="modal fade" id="less" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="less"><strong>Add Supplemental</strong></text>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                {{-- <button type="button" class="btn-close" wire:click="cancel1()" ></button> --}}

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
                        <strong>Update Supplemental</strong>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form class="row gx-3 gy-2 align-items-center">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="category_id"
                                        placeholder="category_id">
                                    <label for="floatingInput">Category ID</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="name" placeholder="Name">
                                    <label for="floatingInput">Name</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="FIRST1" placeholder="FIRST1">
                                    <label for="floatingInput">FIRST1</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="SECOND2" placeholder="SECOND2">
                                    <label for="floatingInput">SECOND2</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="THIRD3" placeholder="THIRD3">
                                    <label for="floatingInput">THIRD3</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="FOURTH4" placeholder="FOURTH4">
                                    <label for="floatingInput">FOURTH4</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                {{-- <button wire:click="updatesupplemental()" class="btn btn-primary" style="background-color: #206BC4; width: 150px;" >Save</button> --}}
                {{-- <button wire:click="updatesupplemental()" class="btn btn-primary" style="background-color: #206BC4; width: 150px;" >Save</button> --}}
            </div>
        </div>
    </div>
</div>
