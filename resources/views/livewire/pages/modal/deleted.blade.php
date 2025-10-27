<div wire:ignore.self class="modal fade" id="deleted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-danger">Are you sure you want to delete? <br> This cannot be undone.</h4>
                <hr>
                <p class="text-left" style="font-size: 16px;"><strong>id:</strong> {{ $id }}</p>
                <p class="text-left" style="font-size: 16px;"><strong>PR_No.:</strong> {{ $PR_No }}</p>
                <p class="text-left" style="font-size: 16px;"><strong>Quarter:</strong> {{ $Quarter }}</p>
                <p class="text-left" style="font-size: 16px;"><strong>Amount:</strong> {{ $Amountc }}</p>

                <div class="mt-4 d-flex justify-content-end">
                    @if ($Quarter === 'First Quarter')
                    <button type="button" class="btn btn-success mx-2" wire:click="deletenewrem1({{$id}})">
                        Delete</button>
                    @elseif ($Quarter === 'Second Quarter')
                    <button type="button" class="btn btn-success mx-2" wire:click="deletenewrem2({{$id}})">
                        Delete</button>
                    @elseif ($Quarter === 'Third Quarter')
                    <button type="button" class="btn btn-success mx-2" wire:click="deletenewrem3({{$id}})">
                        Delete</button>
                    @elseif ($Quarter === 'Fourth Quarter')
                    <button type="button" class="btn btn-success mx-2" wire:click="deletenewrem4({{$id}})">
                        Delete</button>
                    @endif

                    <button type="button" class="btn btn-dark mx-2" data-bs-dismiss="modal">
                        <i class="fas fa-window-close"></i> Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
