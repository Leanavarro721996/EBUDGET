<div wire:ignore.self class="modal fade" id="lesswfp" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="lesswfp"><strong>Details</strong></text>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                <button type="button" class="btn-close" wire:click="cancel1()"></button> </a>
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
                        <strong>Less </strong>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <form class="row gx-3 gy-2 align-items-center">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" wire:model="created_at" placeholder="Date">
                                    <label for="floatingInput">Date</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="AIPRefCode"
                                        placeholder="AIPRefCode" readonly>
                                    <label for="floatingInput">AIPRefCode</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="ACCOUNT_CODE"
                                        placeholder="Account Code" readonly>
                                    <label for="floatingInput">Account Code</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="PPA" placeholder="PPA" readonly>
                                    <label for="floatingInput">Programs, Projects and Activities</label>
                                </div>
                                <!-- 1st Quarter -->
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" wire:model="FIRSTREM"
                                        placeholder="1st Quarter" readonly>
                                    @error('FIRST') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-auto">
                                    <div class="text">
                                        <label class="form-check-label">
                                            Less
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" wire:model="lessFIRST" placeholder="0"
                                        @if($FIRST==0) disabled @endif>
                                    @error('lessFIRST') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- 2nd Quarter -->
                                <div class="col-lg-5">
                                    <input type="0" class="form-control" wire:model="SECONDREM"
                                        placeholder="2nd Quarter" readonly>
                                    @error('SECOND') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-auto">
                                    <div class="text">
                                        <label class="form-check-label">
                                            Less
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" wire:model="lessSECOND" placeholder="0"
                                        @if($SECOND==0) disabled @endif>
                                    @error('lessSECOND') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <!-- 3rd Quarter -->
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" wire:model="THIRDREM"
                                        placeholder="3rd Quarter" readonly>
                                    @error('THIRD') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-auto">
                                    <div class="text">
                                        <label class="form-check-label">
                                            Less
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" wire:model="lessTHIRD" placeholder="0"
                                        @if($THIRD==0) disabled @endif>
                                    @error('lessTHIRD') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <!-- 4th Quarter -->
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" wire:model="FOURTHREM"
                                        placeholder="4th Quarter" readonly>
                                    @error('FOURTH') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-auto">
                                    <div class="text">
                                        <label class="form-check-label">
                                            Less
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" wire:model="lessFOURTH" placeholder="0"
                                        @if($FOURTH==0) disabled @endif>
                                    @error('lessFOURTH') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                {{-- <button wire:click="Less()" class="btn btn-primary" style="background-color: #206BC4; width: 150px;" >Save</button> --}}
                <button wire:click="storedata1()" class="btn btn-primary"
                    style="background-color: #206BC4; width: 150px;">Save</button>
            </div>
        </div>
    </div>
</div>
