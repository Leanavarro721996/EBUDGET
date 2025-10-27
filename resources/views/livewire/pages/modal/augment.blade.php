<div wire:ignore.self class="modal fade" id="augment" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="augment"><strong>Augmentation</strong></text>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                <button type="button" class="btn-close" wire:click="cancel1()"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <strong>Augmentation</strong>
                    </div>
                    <div class="card-body">
                        <form form class="row gx-3 gy-2 align-items-center">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Source of Fund</h5><br>
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
                                                <input type="text" class="form-control" wire:model="PPA"
                                                    placeholder="PPA" readonly>
                                                <label for="floatingInput">Programs, Projects and Activities</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" wire:model="SOURCE_FUND"
                                                    placeholder="SOURCE_FUND" readonly>
                                                <label for="floatingInput">Source of Fund</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" wire:model="FIRSTREM"
                                                    placeholder="First Quarter" readonly>
                                                <label for="floatingInput">First Quarter</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" wire:model="SECONDREM"
                                                    placeholder="Second Quarter" readonly>
                                                <label for="floatingInput">Second Quarter</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" wire:model="THIRDREM"
                                                    placeholder="Third Quarter" readonly>
                                                <label for="floatingInput">Third Quarter</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" wire:model="FOURTHREM"
                                                    placeholder="Fourth Quarter" readonly>
                                                <label for="floatingInput">Fourth Quarter</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Fund Transfer</h5><br>
                                            <div class="form-floating mb-3">
                                                <select id="select" class="form-select" wire:model="selectedview"
                                                    wire:change="editSelected" aria-label="Select a City">
                                                    <option value="">Choose a PPA</option>
                                                    @foreach ($category as $newcateg)
                                                    <option value="{{ $newcateg->id }}">{{ $newcateg->PPA }} </option>

                                                    @endforeach
                                                </select>
                                                <label for="select">Select PPA:</label>
                                            </div>
                                        </div>
                                        @if($selectedPPA)
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" wire:model="FIRSTREM"
                                                placeholder="First Quarter" readonly>
                                            <label for="floatingInput">First Quarter</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" wire:model="SECONDREM"
                                                placeholder="Second Quarter" readonly>
                                            <label for="floatingInput">Second Quarter</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" wire:model="THIRDREM"
                                                placeholder="Third Quarter" readonly>
                                            <label for="floatingInput">Third Quarter</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" wire:model="FOURTHREM"
                                                placeholder="Fourth Quarter" readonly>
                                            <label for="floatingInput">Fourth Quarter</label>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </form>
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
