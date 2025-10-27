<div wire:ignore.self class="modal fade" id="addcategories" tabindex="-1" aria-labelledby="addcategories"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="addcategories"><strong>New Programs, Projects, and
                        Activities</strong></text>
                <a href="{{ route('view', ['id' => $id]) }}">
                    <button class="btn btn-default btn-close"></button>
                </a>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <strong>New Programs, Projects, and Activities</strong>
                    </div>
                    <!-- ALERT MESSAGE -->
                    <div class="card-body">
                        <form>
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
                            <!-- BODY -->


                            <div class="mb-2">
                                <input type="text" class="form-control" wire:model="AIPRefCode" placeholder="AIPRefCode"
                                    readonly>
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" wire:model="ACCOUNT_CODE"
                                    placeholder="Account Code" readonly>
                                @error('ACCOUNT_CODE') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" wire:model="Year" placeholder="Year">
                                @error('Year') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-2">
                                <select class="form-select form-select-md mb-2" id="myDropdown" wire:model="CATEGORY"
                                    wire:change="setCategory($event.target.value)">
                                    <option value="">Select an option</option>
                                    <option value="Daily">Daily</option>
                                    <option value="Weekly">Weekly</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Quarterly">Quarterly</option>
                                </select>
                            </div>

                            <div class="mb-2">
                                <input type="text" class="form-control" wire:model="PPA"
                                    placeholder="Programs, Projects and Activities">
                                @error('PPA') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" wire:model="RESOURCES"
                                    placeholder="Resources Needed">
                                @error('RESOURCES') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" wire:model="RESPONSIBLE_UNIT"
                                    placeholder="Responsible Person/Unit">
                                @error('RESPONSIBLE_UNIT') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" wire:model="OBJECT_EXPENDITURE"
                                    placeholder="Object of Expenditure">
                                @error('OBJECT_EXPENDITURE') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" wire:model="SOURCE_FUND"
                                    placeholder="Source of Fund">
                                @error('SOURCE_FUND') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-2">
                                <input type="text" class="form-control" wire:model="NOTE" placeholder="NOTE">
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    Add Amount
                                    <div class="mb-2">
                                        <input type="number" class="form-control" id="FIRST" wire:model="FIRST"
                                            placeholder="First Quarter">
                                    </div>
                                    <div class="mb-2">
                                        <input type="number" class="form-control" wire:model="SECOND"
                                            placeholder="Second Quarter">
                                    </div>
                                    <div class="mb-2">
                                        <input type="number" class="form-control" wire:model="THIRD"
                                            placeholder="Third Quarter">
                                    </div>
                                    <div class="mb-2">
                                        <input type="number" class="form-control" wire:model="FOURTH"
                                            placeholder="Fourth Quarter">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- BUTTON -->
            <div class="modal-footer d-flex justify-content-center">
                <button wire:click.prevent="store()" class="btn btn-primary"
                    style="background-color: #206BC4; width: 150px;">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('myDropdown').addEventListener('change', function () {
        var selectedValue = this.value;

        // Hide all divs
        document.getElementById('div1').style.display = 'none';
        document.getElementById('div2').style.display = 'none';
        document.getElementById('div3').style.display = 'none';
        document.getElementById('div4').style.display = 'none';

        // Show the selected div
        if (selectedValue) {
            document.getElementById(selectedValue).style.display = 'block';
        }
    });

    function handleDropdownChange() {
        Livewire.emit('dropdownChanged');
    }
    document.getElementById('myDropdown').addEventListener('change', function () {
        // Get the selected value
        var selectedValue = this.value;

        // Call your function or execute code based on the selected value
        handleDropdownChange(selectedValue);
    });

</script>
