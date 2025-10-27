<style>
    .form-control {
        height: 50px;
        /* Adjust the height as needed */
    }

</style>
<div wire:ignore.self class="modal fade" id="calculateadd" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="calculateadd"><strong>Sum of Details </strong></text>
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
                        <strong>Add Amount</strong>
                    </div>
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
                                    <input type="number" class="form-control" wire:model="FIRSTadd"
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
                                    <input type="number" class="form-control" wire:model="SECONDadd"
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
                                    <input type="number" class="form-control" wire:model="THIRDadd"
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
                                    <input type="number" class="form-control" wire:model="FOURTHadd"
                                        placeholder="4th Quarter">
                                    @error('FOURTHadd') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div hidden>
                                    <span>Sum: {{ $total1 }}</span>
                                    <span>Sum: {{ $total2 }}</span>
                                    <span>Sum: {{ $total3 }}</span>
                                    <span>Sum: {{ $total4 }}</span>
                                    <span>Sum total: {{ $totalapp }}</span></div>
                            </form>
                            <br>
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <table id="example" class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>Created_at</th>
                                                <th>First Quarter</th>
                                                <th>Second Quarter</th>
                                                <th>Third Quarter</th>
                                                <th>Fourth Quarter</th>
                                            </tr>
                                        </thead>
                                        @php
                                        $FIRSTadd = 0;
                                        $SECONDadd = 0;
                                        $THIRDadd = 0;
                                        $FOURTHadd = 0;
                                        @endphp
                                        <tbody>
                                            @if(!is_null($add) && count($add) > 0)
                                            @foreach($add as $addingdetails)
                                            <tr wire:key="{{ $addingdetails->id }}">
                                                <td>{{ $addingdetails->created_at }}</td>
                                                <td>{{ $addingdetails->FIRSTadd }}</td>
                                                <td>{{ $addingdetails->SECONDadd }}</td>
                                                <td>{{ $addingdetails->THIRDadd }}</td>
                                                <td>{{ $addingdetails->FOURTHadd }}</td>
                                            </tr>
                                            @php
                                            // Accumulate the amounts
                                            // $FIRST += $newcateg->FIRST;
                                            $FIRSTadd += $addingdetails->FIRSTadd;
                                            $SECONDadd += $addingdetails->SECONDadd;
                                            $THIRDadd += $addingdetails->THIRDadd;
                                            $FOURTHadd += $addingdetails->FOURTHadd;
                                            @endphp
                                            @endforeach
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr style="text-align: center ">
                                                <td style="color:#ff0000;"><strong>Total</strong></td>
                                                <td style="color: #ff0000;">
                                                    <strong>{{ number_format($FIRSTadd, 2, '.', ',') }}</strong></td>
                                                <td style="color: #ff0000;">
                                                    <strong>{{ number_format($SECONDadd, 2, '.', ',') }}</strong></td>
                                                <td style="color: #ff0000;">
                                                    <strong>{{ number_format($THIRDadd, 2, '.', ',') }}</strong></td>
                                                <td style="color: #ff0000;">
                                                    <strong>{{ number_format($FOURTHadd, 2, '.', ',') }}</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                {{-- <button  wire:click="updateadd()"class="btn btn-primary" style="background-color: #206BC4; width: 150px;"data-dismiss="modal" >Save</button> --}}
                {{-- <button  wire:click="calculateTotal()"class="btn btn-primary" style="background-color: #206BC4; width: 150px;" >calculate</button> --}}
                <button wire:click="storedata()" class="btn btn-primary"
                    style="background-color: #206BC4; width: 150px;">Save</button>
            </div>
        </div>
    </div>
</div>
</div>
