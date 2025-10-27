<style>
    .form-control {
        height: 50px;
        /* Adjust the height as needed */
    }

</style>
<div wire:ignore.self class="modal fade" id="supp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="supp"><strong>Less</strong></text>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                <a href="{{ route('view', ['id' => $id]) }}">
                    <button class="btn btn-default btn-close">Cancel</button></a>
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
                        <strong>Subtract from Time Frame</strong>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <form class="row gx-3 gy-2 align-items-center">
                                <!-- 1st Quarter -->
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" wire:model="FIRST" placeholder="1st Quarter"
                                        readonly>
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
                                    <input type="0" class="form-control" wire:model="SECOND" placeholder="2nd Quarter"
                                        readonly>
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
                                    <input type="text" class="form-control" wire:model="THIRD" placeholder="3rd Quarter"
                                        readonly>
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
                                    <input type="text" class="form-control" wire:model="FOURTH"
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
                <button wire:click="Less()" class="btn btn-primary"
                    style="background-color: #206BC4; width: 150px;">Save</button>
            </div>
        </div>
    </div>
</div>
