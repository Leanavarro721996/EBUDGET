<div wire:ignore.self class="modal fade" id="updatecategories" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="updatecategories"><strong>Updating Records</strong></text>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                <button type="button" class="btn-close" wire:click="cancel1()"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <strong>Updating Records</strong>
                    </div>
                    <div class="card-body">
                        <form>
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
                            <div class="card-body">
                                <input type="hidden" wire:model="id">
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
                                    <input type="text" class="form-control" wire:model="Year" placeholder="year"
                                        readonly>
                                    <label for="floatingInput">Year </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="PPA" placeholder="PPA">
                                    <label for="floatingInput">"Programs, Projects and Activities"</label>
                                    @error('Programs, Projects and Activities') <span
                                        class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="RESOURCES"
                                        placeholder="RESOURCES">
                                    <label for="floatingInput">Resources</label>
                                    @error('RESOURCES') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="RESPONSIBLE_UNIT"
                                        placeholder="RESPONSIBLE_UNIT">
                                    <label for="floatingInput">Responsible unit</label>
                                    @error('RESPONSIBLE_UNIT') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="OBJECT_EXPENDITURE"
                                        placeholder="OBJECT_EXPENDITURE">
                                    <label for="floatingInput">Object Expenditure</label>
                                    @error('OBJECT_EXPENDITURE') <span
                                        class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="SOURCE_FUND"
                                        placeholder="SOURCE_FUND">
                                    <label for="floatingInput">Source of Fund</label>
                                    @error('SOURCE_FUND') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:model="NOTE" placeholder="NOTE">
                                    <label for="floatingInput">NOTE</label>
                                    @error('NOTE') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        Amount
                                        <div class="mb-2">
                                            <input type="number" class="form-control" id="FIRST" wire:model="FIRST"
                                                placeholder="First Quarter">
                                        </div>
                                        <div class="mb-2">
                                            <input type="number" class="form-control" wire:model="SECOND"
                                                placeholder="Second Quarter">
                                        </div>
                                        <div class="mb-2">
                                            <input type="number" class="form-control" wire:model="THIRD"
                                                placeholder="Third Quarter">
                                        </div>
                                        <div class="mb-2">
                                            <input type="number" class="form-control" wire:model="FOURTH"
                                                placeholder="Fourth Quarter">
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button wire:click.prevent="updatecategorie()" class="btn btn-primary"
                    style="background-color: #206BC4; width: 150px;">Update</button>
            </div>
        </div>
    </div>
</div>
