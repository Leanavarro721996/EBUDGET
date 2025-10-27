<style>
    .form-control {
        height: 50px;
        /* Adjust the height as needed */
    }

</style>
<div wire:ignore.self class="modal fade" id="deductiondetails" tabindex="-1" aria-labelledby="deductiondetails"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <text class="modal-title" id="deductiondetails"><strong>Deduction Details</strong></text>
                <button type="button" class="btn-close" wire:click="cancel1()"></button>
                {{-- <a href="{{ route('view', ['id' => $id]) }}">
                <button class="btn btn-default btn-close">Cancel</button>
                </a> --}}
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
                        <strong>Deduction Details</strong>
                    </div>


                    <div class="card-body">
                        <select id="myDropdown" class="form-select form-select-md ">

                            <option value="">Select an option</option>
                            <option value="div1">1st Quarter</option>
                            <option value="div2">2nd Quarter</option>
                            <option value="div3">3rd Quarter</option>
                            <option value="div4">4th Quarter</option>
                        </select>

                        <div class="py-2">
                            <div wire:ignore.self class="form-floating mb-3" id="div1" style="display: none;">
                                @include('livewire.pages.modal.fquarterdd')
                            </div>
                            <div wire:ignore.self class="form-floating mb-3" id="div2" style="display: none;">
                                @include('livewire.pages.modal.squarterdd')
                            </div>
                            <div wire:ignore.self class="form-floating mb-3" id="div3" style="display: none;">
                                @include('livewire.pages.modal.tquarterdd')
                            </div>
                            <div wire:ignore.self class="form-floating mb-3" id="div4" style="display: none;">
                                @include('livewire.pages.modal.ftquarterdd')
                            </div>
                        </div>
                    </div>
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

        function handleDropdownChange(value) {
            // Reset input fields
            resetInputs();

            // Implement additional logic based on the selected value if needed
            console.log('Selected value:', value);
            if (value === 'div1') {
                console.log('Quarter 1 selected');
                // Perform actions for Quarter 1
            } else if (value === 'div2') {
                console.log('Quarter 2 selected');
                // Perform actions for Quarter 2
            } else if (value === 'div3') {
                console.log('Quarter 3 selected');
                // Perform actions for Quarter 3
            } else if (value === 'div4') {
                console.log('Quarter 4 selected');
                // Perform actions for Quarter 4
            } else {
                console.log('No valid option selected');
            }
        }

        function resetInputs() {
            // Reset input fields
            document.getElementById('amount1').value = '';
            document.getElementById('amount2').value = '';
            document.getElementById('amount3').value = '';
            document.getElementById('amount4').value = '';
            document.getElementById('totaldeduction1').value = '';
            document.getElementById('totaldeduction2').value = '';
            document.getElementById('totaldeduction3').value = '';
            document.getElementById('totaldeduction4').value = '';


        }

    </script>
</div>
