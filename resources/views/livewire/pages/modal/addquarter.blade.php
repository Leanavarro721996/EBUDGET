 <div wire:ignore.self class="modal fade" id="addquarter" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-l">
         <div class="modal-content">
             <div class="modal-header">
                 <text class="modal-title" id="addquarter"><strong>Quarter</strong></text>
                 {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                 <button type="button" class="btn-close" wire:click="cancel1()"></button>
             </div>
             <div class="modal-body">
                 <div class="card">

                     <div class="card-body">
                         <form form class="row gx-3 gy-2 align-items-center">

                             <label for="floatingInput">First Quarter</label>
                             <div class="form-floating mb-3">
                                 <input type="number" class="form-control" wire:model="FIRST" placeholder="Total"
                                     readonly>
                                 <label for="floatingInput" class="ms-2">Total</label>
                             </div>
                             <div class="form-floating mb-3">
                                 <input type="number" class="form-control" wire:model="FIRSTREM"
                                     placeholder="Remaining Balance" readonly>
                                 <label for="floatingInput" class="ms-2">Remaining Balance</label>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             <div class="modal-footer d-flex justify-content-center">
                 {{-- <button wire:click="RB1()" class="btn btn-primary" style="background-color: #206BC4; width: 150px;" >add to 2nd Quarter</button> --}}
                 <button style="background-color: #206BC4;" type="button" class="btn btn text-white"
                     data-bs-toggle="modal" data-bs-target="#messagebox1st" title="Deduction Details">
                     add to 2nd quarter</button>

             </div>
         </div>
     </div>
 </div>
 @include('livewire.pages.modal.messagebox1st')
