<div>
    <div wire:ignore.self class="modal fade" id="messagebox3rd" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body ">
                    <h4 class="text-dark"> Would you like to add this to the Fourth Quarter? </h4> <br>

                    <button wire:click.prevent="RB3()" type="button" class="btn btn-primary btn-m mx-2"> Yes </button>
                    <button type="button" class=" btn btn-dark btn-m mx-2" wire:click="cancel1()">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
