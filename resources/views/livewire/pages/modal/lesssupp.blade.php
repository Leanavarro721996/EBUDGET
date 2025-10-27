<div wire:ignore.self class="modal fade" id="lesssupp" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="lesssupp"><strong>Augmentation</strong></text>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  --}}
                <button type="button" class="btn-close" wire:click="cancel1()"></button>

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
                        <strong>Less Supplemental</strong>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <form class="row gx-3 gy-2 align-items-center">
                                <div class="form-floating mb-3" style="display: none;">
                                    <input type="text" class="form-control" wire:model="id" placeholder="category_id">
                                    <label for="floatingInput">id</label>
                                </div>
                                <div class="form-floating mb-3" style="display: none;">
                                    <input type="text" class="form-control" wire:model="category_id"
                                        placeholder="category_id">
                                    <label for="floatingInput">category_id</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="name" placeholder="name"
                                        readonly>
                                    <label for="floatingInput">name</label>
                                </div>

                                <!-- 1st Quarter -->
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" wire:model="FIRST1"
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
                                    <input type="text" class="form-control" wire:model="lessupp1" placeholder="0"
                                        @if($FIRST1==0) disabled @endif>
                                    @error('lessFIRST') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- 2nd Quarter -->
                                <div class="col-lg-5">
                                    <input type="0" class="form-control" wire:model="SECOND2" placeholder="2nd Quarter"
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
                                    <input type="text" class="form-control" wire:model="lessupp2" placeholder="0"
                                        @if($SECOND2==0) disabled @endif>
                                    @error('lessSECOND') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <!-- 3rd Quarter -->
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" wire:model="THIRD3"
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
                                    <input type="text" class="form-control" wire:model="lessupp3" placeholder="0"
                                        @if($THIRD3==0) disabled @endif>
                                    @error('lessTHIRD') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <!-- 4th Quarter -->
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" wire:model="FOURTH4"
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
                                    <input type="text" class="form-control" wire:model="lessupp4" placeholder="0"
                                        @if($FOURTH4==0) disabled @endif>
                                    @error('lessFOURTH') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                {{-- <button wire:click="Less()" class="btn btn-primary" style="background-color: #206BC4; width: 150px;" >Save</button> --}}
                <button wire:click="storedata3()" class="btn btn-primary"
                    style="background-color: #206BC4; width: 150px;">Save</button>
            </div>
        </div>
    </div>
</div>
