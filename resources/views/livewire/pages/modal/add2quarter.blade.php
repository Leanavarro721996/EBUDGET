 @include('livewire.pages.modal.messagebox2nd')
 <div wire:ignore.self class="modal fade" id="add2quarter" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-l">
         <div class="modal-content">
             <div class="modal-header">
                 <text class="modal-title" id="add2quarter"><strong>Quarter</strong></text>
                 {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                 <button type="button" class="btn-close" wire:click="cancel1()"></button>
             </div>
             <div class="modal-body">
                 <div class="card">

                     <div class="card-body">
                         <form form class="row gx-3 gy-2 align-items-center">
                             <div class="border rounded p-3 mb-2">
                                 <label for="floatingInput">First Quarter</label>
                                 <div class="form-floating mb-3">
                                     <input type="number" class="form-control" wire:model="FIRST" placeholder="Total"
                                         readonly>
                                     <label for="floatingInput" class="ms-2">Total</label>
                                 </div>

                                 <div class="form-floating mb-3 d-flex align-items-center gap-2">
                                     <input type="number" class="form-control" wire:model="FIRSTREM"
                                         placeholder="Remaining Balance" readonly>
                                     <label for="floatingInput" class="ms-2">Remaining Balance</label>
                                     <div class="form-check ms-3">
                                         <input class="form-check-input" type="checkbox" wire:model="firstChecked"
                                             id="firstQuarterCheck">
                                     </div>
                                 </div>
                             </div>

                             <br>
                             <div class="border rounded p-3 mb-2">
                                 <label for="floatingInput">Second Quarter</label>
                                 <div class="form-floating mb-3">
                                     <input type="number" class="form-control" wire:model="SECOND" placeholder="Total"
                                         readonly>
                                     <label for="floatingInput" class="ms-2">Total</label>
                                 </div>

                                 <div class="form-floating mb-3 d-flex align-items-center gap-2">
                                     <input type="number" class="form-control" wire:model="SECONDREM"
                                         placeholder="Remaining Balance" readonly>
                                     <label for="floatingInput" class="ms-2">Remaining Balance</label>
                                     <div class="form-check ms-3">
                                         <input class="form-check-input" type="checkbox" wire:model="secondChecked"
                                             id="secondQuarterCheck">
                                     </div>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             <div class="modal-footer d-flex justify-content-center">
                 {{-- <button wire:click="RB1()" class="btn btn-primary" style="background-color: #206BC4; width: 150px;" >add to 2nd Quarter</button> --}}
                 <button style="background-color: #206BC4;" type="button" class="btn btn text-white"
                     data-bs-toggle="modal" data-bs-target="#messagebox2nd" title="Deduction Details">
                     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                         fill="#FFFEFE">
                         <path
                             d="M3 6c-.55 0-1 .45-1 1v13c0 1.1.9 2 2 2h13c.55 0 1-.45 1-1s-.45-1-1-1H5c-.55 0-1-.45-1-1V7c0-.55-.45-1-1-1zm17-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 9h-3v3c0 .55-.45 1-1 1s-1-.45-1-1v-3h-3c-.55 0-1-.45-1-1s.45-1 1-1h3V6c0-.55.45-1 1-1s1 .45 1 1v3h3c.55 0 1 .45 1 1s-.45 1-1 1z" />
                     </svg>add to 3rd quarter</button>

             </div>
         </div>
     </div>
 </div>
