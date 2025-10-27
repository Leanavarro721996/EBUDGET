<style>
    .form-control {
        height: 50px;
        /* Adjust the height as needed */
    }

</style>

<div wire:ignore.self class="modal fade" id="addaugment" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="addaugment"><strong>Augmentation </strong></text>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  --}}
                <button type="button" class="btn-close" wire:click="cancel1()"></button>

            </div>
            <!-- ALERT MESSAGE -->
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
                        <strong>Add Augmentation</strong>
                    </div>
                    <!-- BODY -->
                    <div class="card-body">
                        <div class="container">
                            <form class="row gx-3 gy-2 align-items-center">
                                <!-- 1st Quarter -->
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" wire:model="created_at" placeholder="Date"
                                        readonly>
                                    <label for="floatingInput">Created Date</label>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" wire:model="id" placeholder="uniqueID"
                                        hidden>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" wire:model="PPA"
                                        placeholder="Programs, Projects and Activities" readonly>
                                    <label for="floatingInput">Programs, Projects and Activities</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" wire:model="Date" placeholder="Date" hidden>
                                </div>
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="FIRSTREM"
                                        placeholder="1st Quarter" readonly>
                                    @error('FIRST') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-auto">
                                    <div class="text">
                                        <label class="form-check-label">
                                            add
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="FIRSTaug"
                                        placeholder="1st Quarter">
                                    @error('FIRSTadd') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <!-- 2nd Quarter -->
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="SECONDREM"
                                        placeholder="2nd Quarter" readonly>
                                    @error('SECOND') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-auto">
                                    <div class="text">
                                        <label class="form-check-label">
                                            add
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="SECONDaug"
                                        placeholder="2nd Quarter">
                                    @error('SECONDadd') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <!-- 3rd Quarter -->
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="THIRDREM"
                                        placeholder="3rd Quarter" readonly>
                                    @error('THIRD') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-auto">
                                    <div class="text">
                                        <label class="form-check-label">
                                            add
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="THIRDaug"
                                        placeholder="3rd Quarter">
                                    @error('THIRDadd') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <!-- 4th Quarter -->
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="FOURTHREM"
                                        placeholder="4th Quarter" readonly>
                                    @error('FOURTH') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-auto">
                                    <div class="text">
                                        <label class="form-check-label">
                                            add
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" wire:model="FOURTHaug"
                                        placeholder="4th Quarter">
                                    @error('FOURTHadd') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </form>
                            <div class="modal-footer d-flex justify-content-center">
                                {{-- <button  wire:click="updateadd()"class="btn btn-primary" style="background-color: #206BC4; width: 150px;"data-dismiss="modal" >Save</button> --}}
                                <button wire:click="storedata2()" class="btn btn-primary"
                                    style="background-color: #206BC4; width: 150px;">Save</button>
                                {{-- <button  wire:click="save()"class="btn btn-primary" style="background-color: #206BC4; width: 150px;" >Save</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
