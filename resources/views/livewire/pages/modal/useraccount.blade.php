<div wire:ignore.self class="modal fade" id="useraccount" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="useraccount"><strong>Add New Account</strong></text>
                <a href="{{ route('dashboard') }}">
                    <button class="btn btn-default btn-close"></button>
                </a>
            </div>
            <div class="modal-body">
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
                <div class="card">
                    <div class="card-header">
                        <strong>Add New Account</strong>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <select class="form-select form-select-md mb-2" id="myDropdown" wire:model="designation"
                                    wire:change="setdesignation($event.target.value)">
                                    <option value="">Select an option</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Encoder">Encoder</option>
                                    <option value="Monotoring">Monitoring</option>
                                </select>

                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" wire:model="name" placeholder="Full Name">
                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" wire:model="email" placeholder="email">
                                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" wire:model="password" placeholder="password">
                                @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button wire:click.prevent="storenew()" class="btn btn-primary"
                    style="background-color: #206BC4; width: 150px;">Save</button>
            </div>
        </div>
    </div>
</div>
