<div>
    <div wire:ignore.self class="modal fade" id="cancelmodal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body ">
                    <h4 class="text-danger"> Are you sure you want to cancel? <BR> This cannot be undone.</h4> <br>

                    <p class="text-left" style="font-size: 16px;"><strong>PR_No.:</strong> {{ $PR_No }}</p>
                    {{-- <p class="text-left" style="font-size: 16px; " ><strong>ID:</strong> {{ $deductionId }}</p>
                    --}}
                    <p class="text-left" style="font-size: 16px;"><strong>Quarter:</strong> {{ $Quarter }}</p>
                    <p class="text-left" style="font-size: 16px;"><strong>Amount:</strong> {{ $Amountc }}</p>

                    {{-- <p class="text-left" style="font-size: 16px;"><strong>Status:</strong> {{ $Status }}</p> --}}
                    <hr>
                    @if ($Quarter === 'First Quarter')
                    <button type="button" class="btn btn-success" wire:click="updatenewrem1()">Confirm
                        Cancellation</button>
                    @elseif ($Quarter === 'Second Quarter')
                    <button type="button" class="btn btn-success" wire:click="updatenewrem2()">Confirm
                        Cancellation</button>
                    @elseif ($Quarter === 'Third Quarter')
                    <button type="button" class="btn btn-success" wire:click="updatenewrem3()">Confirm
                        Cancellation</button>
                    @elseif ($Quarter === 'Fourth Quarter')
                    <button type="button" class="btn btn-success" wire:click="updatenewrem4()">Confirm
                        Cancellation</button>
                    @endif
                    <button class="btn btn text-white" data-bs-dismiss="modal"
                        style="background-color: #C42C2C;">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
