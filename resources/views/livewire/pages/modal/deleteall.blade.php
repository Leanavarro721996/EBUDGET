<div>
    <div wire:ignore.self class="modal fade" id="deleteall" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body ">
                    <h4 class="text-dark"> Are you sure you want to Delete? </h4> <br>

                    <button wire:click.prevent="delete({{$id}})" type="button" class="btn btn-danger btn-lg mx-2">
                        <i class="fas fa-trash"></i> Yes
                    </button>
                    <button type="button" data-bs-dismiss="modal" class=" btn btn-dark btn-lg mx-2">
                        <i class="fas fa-window-close"></i> No
                    </button>
                    {{-- <button class="btn btn text-white" data-bs-dismiss = "modal" style="background-color: #5a5757;" >Cancel</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
