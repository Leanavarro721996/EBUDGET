<style>
    .form-control {
        height: 50px;
        /* Adjust the height as needed */
    }

</style>

<div class="form-floating mb-3">
    <input type="date" class="form-control" wire:model="Date" placeholder="Date">
    <label for="floatingInput">Date</label>
    @error('Date') <span class="text-danger">{{ $message }}</span>@enderror
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" wire:model="PR_No" placeholder="P.R No.">
    <label for="floatingInput">PR No./Payee </label>
    @error('Payee or PR No.') <span class="text-danger">{{ $message }}</span>@enderror
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" wire:model="Title" placeholder="Title">
    <label for="floatingInput">Title</label>
    @error('Title') <span class="text-danger">{{ $message }}</span>@enderror
</div>

<div class="form-floating mb-3" id="div1">
    <input type="number" class="form-control" wire:model="SECONDREM" placeholder="Account Code" readonly>
    <label for="Second">2nd quarter Remaining Balance</label>
</div>

<div class="form-floating mb-3">
    <input type="number" class="form-control" id="amount2" wire:model="Amount" wire:keyup="calculateTotal2"
        placeholder="Amount">
    <label for="amount">Amount</label>
</div>
<div class="form-floating mb-3">
    <input type="number" class="form-control" id="totaldeduction2" wire:model="Totaldeduction" placeholder="Total"
        readonly>
    <label for="totaldeduction">Total</label>
</div>

<div class="modal-footer d-flex justify-content-center">
    <!-- Display the error message if it exists -->
    @if($errorMessage)
    <div class="alert alert-danger">
        {{ $errorMessage }}
    </div>
    @endif
    <!-- Save Button -->
    <button wire:click.prevent="store2()" class="btn btn-primary" @if(!$showSaveButton) style="display:none; " @endif>
        Save
    </button>
</div>
