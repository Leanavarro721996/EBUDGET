
<div> <!-- SINGLE ROOT WRAPPER -->

    <style>
        /* BREADCRUMB */
        .breadcrumb-item h2 {
            font-size: 20px;
        }

        /* SEPARATOR */
        .separator {
            text-align: center;
        }

        .line {
            width: 50%;
            height: 1px;
            background-color: #9CA0A4;
            margin: 8px auto;
        }

        h6 {
            font-family: 'SF Pro Display', sans-serif;
            color: #808080;
            font-size: 12px;
            margin: 0;
            padding: 14px 0;
        }

        h4 {
            font-family: 'SF Pro Display', sans-serif;
            color: #3A3B3C;
        }

        /* TABLE */
        .table {
            border-color: #808080;
        }

        .table th {
            font-size: 12px;
            border-color: #808080;
        }

        .table td {
            font-size: 12px;
            border-color: #808080;
        }

        .table thead th {
            background-color: #ccddff;
            color: #808080;
            border-color: #808080;
        }

        /* CARD */
        .card-body {
            font-family: 'SF Pro Display', sans-serif;
        }

        @media print {
            @page {
                size: landscape;
            }

            .text-danger {
                background-color: #f8d7da;
                color: #721c24;
            }
        }
    </style>

    @section ('pageHeader')
        <div class="container-fluid no-print">
            <h4>
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" wire:navigate>My Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('budget')}}" wire:navigate>Work and Financial Plan</a></li>
                    <li class="breadcrumb-item"><a href="" wire:navigate>View</a></li>
                    <li class="breadcrumb-item">View Activity</li>
                </ol>
            </h4>
        </div>
    @endsection

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card text-white no-print" style="background-color: #5E8CD2;">
                    <div class="card-header">
                        <div class="card-title h5 text-center"><strong>ACTIVITY </strong></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <br><strong>Category:</strong><br> {{ $CATEGORY }}
                                <br><strong>AIPRefCode:</strong><br> {{$AIPRefCode}}
                                <br><strong>PPA:</strong><br> {{ $PPA }}
                                <br><strong>Resources:</strong><br> {{ $RESOURCES }}
                                <br><strong>Year:</strong><br> {{ $Year }}
                            </div>
                            <div class="col">
                                <br><strong>Responsible unit:</strong><br>{{ $RESPONSIBLE_UNIT }}
                                <br><strong>Account code:</strong><br>{{ $ACCOUNT_CODE }}
                                <br><strong>Object Expenditure:</strong><br>{{ $OBJECT_EXPENDITURE }}
                                <br><strong>Source of Fund:</strong><br> {{ $SOURCE_FUND }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-white no-print" style="background-color: #5E8CD2;">
                    <div class="card-header">
                        <div class="card-title h5 text-center"><strong>QUARTERLY </strong></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <br><strong>FIRST QUARTER:</strong><br>Total: {{ number_format($FIRST, 2, '.', ',') }}<br>Remaining Balance: {{ number_format($FIRSTREM, 2, '.', ',') }} <br>
                                <br><strong>SECOND QUARTER:</strong><br>Total: {{ number_format($SECOND, 2, '.', ',') }}<br>Remaining Balance: {{ number_format($SECONDREM, 2, '.', ',') }}
                                <button style="background-color: #206BC4;" type="button" class="btn btn text-white" data-bs-toggle="modal" data-bs-target="#addquarter" wire:click.prevent="editquarter({{ $newcateg->id }}, '{{ $newcateg->FIRST }}', '{{ $newcateg->SECOND }}', '{{ $newcateg->THIRD }}', '{{ $newcateg->FOURTH }}')">add</button>
                                <br>
                            </div>
                            <div class="col">
                                <br><strong>THIRD QUARTER:</strong><br>Total: {{ number_format($THIRD, 2, '.', ',') }}<br>Remaining Balance: {{ number_format($THIRDREM, 2, '.', ',') }}
                                <button style="background-color: #206BC4;" type="button" class="btn btn text-white" data-bs-toggle="modal" data-bs-target="#add2quarter" wire:click.prevent="editquarter({{ $newcateg->id }}, '{{ $newcateg->FIRST }}', '{{ $newcateg->SECOND }}', '{{ $newcateg->THIRD }}', '{{ $newcateg->FOURTH }}')">add</button><br>
                                <br><strong>FOURTH QUARTER:</strong><br>Total: {{ number_format($FOURTH, 2, '.', ',') }}<br>Remaining Balance: {{ number_format($FOURTHREM, 2, '.', ',') }}
                                <button style="background-color: #206BC4;" type="button" class="btn btn text-white" data-bs-toggle="modal" data-bs-target="#add3quarter" wire:click.prevent="editquarter({{ $newcateg->id }}, '{{ $newcateg->FIRST }}', '{{ $newcateg->SECOND }}', '{{ $newcateg->THIRD }}', '{{ $newcateg->FOURTH }}')">add</button>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid no-print">
        <div class="row">
            <div class="col text-left">
                <button style="background-color: #206BC4;" type="button" class="btn btn text-white" data-bs-toggle="modal" data-bs-target="#deductiondetails" title="Deduction Details" wire:click.prevent="edit({{ $newcateg->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFEFE">
                        <path d="M3 6c-.55 0-1 .45-1 1v13c0 1.1.9 2 2 2h13c.55 0 1-.45 1-1s-.45-1-1-1H5c-.55 0-1-.45-1-1V7c0-.55-.45-1-1-1zm17-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 9h-3v3c0 .55-.45 1-1 1s-1-.45-1-1v-3h-3c-.55 0-1-.45-1-1s.45-1 1-1h3V6c0-.55.45-1 1-1s1 .45 1 1v3h3c.55 0 1 .45 1 1s-.45 1-1 1z"/>
                    </svg>
                    Deduction Details
                </button>
            </div>
        </div>

        <div class="separator no-print">
            <div class="line"></div>
            <h6 style="color: #9CA0A4;">WORK AND FINANCIAL PLAN INDIVIDUAL OVERVIEW</h6>
            <div class="line"></div>
        </div>

        <!-- SEARCH BAR -->
        <div class="col-12">
            <form wire:submit="search">
                <div class="input-group">
                    <input type="text" wire:model="query" wire:keydown="search" class="form-control" placeholder="Search...">
                </div>
            </form>
        </div>
        <br>

        <!-- TABLE -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr style="text-align: center">
                                <th>Quarter</th>
                                <th>PR No.</th>
                                <th>Title</th>               
                                <th>Date</th>
                                <th>Deduction</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php $Amount = 0; @endphp
                        <tbody>
                            @foreach($deduction as $detailsdeduction)
                                @if ($detailsdeduction->uniqueID == $id)
                                    <tr style="text-align: center">
                                        <td>{{ $detailsdeduction->Quarter }}</td>
                                        <td>{{ $detailsdeduction->PR_No }}</td>
                                        <td>{{ $detailsdeduction->Title }}</td>
                                        <td>{{ $detailsdeduction->Date }}</td>
                                        <td>{{ number_format($detailsdeduction->Amount, 2, '.', ',') }}</td>
                                        <td>
                                            @if($detailsdeduction->Status === 'CANCELLED')
                                                <span class="badge bg-danger p-2 text-xs" style="font-size: 0.8rem;">{{ $detailsdeduction->Status }}</span>
                                            @else
                                                <span class="badge bg-success">{{ $detailsdeduction->Status }}</span>
                                            @endif
                                        </td>
                                        <td class="no-print">
                                            @if ($detailsdeduction->Status != 'CANCELLED')
                                                <div class="btn-group dropend show">
                                                    <button style="background-color: #f5f5f5;" type="button" wire:click="editcancel({{ $detailsdeduction->id }}, '{{ $detailsdeduction->Status }}')" class="btn btn dropdown-item" data-bs-toggle="modal" data-bs-target="#cancelmodal">
                                                        <img src="{{ asset('images/cancel.png') }}" style="width: 24px; height: 24px; margin-right: 8px;">
                                                        CANCEL
                                                    </button>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @php $Amount += $detailsdeduction->Amount; @endphp
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            @if($deduction->isNotEmpty())
                                <tr style="text-align: center ">
                                <td style="color:#ff0000;"><strong>Total </strong> </td>
                                <td style="color: #ff0000;"><strong> - - </strong> </td>
                                <td style="color: #ff0000;"><strong> - - </strong> </td>
                                <td style="color: #ff0000;"><strong> - - </strong>  </td>
                            <td style="color: #ff0000;"><strong>{{ number_format($Amount, 2, '.', ',') }} </strong></td>
                            <td style="color: #ff0000;"><strong> - - </strong>  </td>
                            </tr>
                            @elseif($deduction !== null && $deduction->isEmpty())
                                <tr>
                                    <td colspan="16" style="text-align: center; vertical-align: middle; font-size: 16px;">
                                        <p>Sorry! No results found.</p>
                                    </td>
                                </tr>
                            @endif
                        </tfoot>
                    </table>
                </div>
            </div>

        @include('livewire.pages.modal.deductiondetails')
        @include('livewire.pages.modal.cancelmodal')
        @include('livewire.pages.modal.addquarter')
        @include('livewire.pages.modal.add2quarter')
        @include('livewire.pages.modal.add3quarter')
    </div>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('created', () => {
                $('#Deductiondetails').modal('hide');
            });
        });
    </script>
 
</div> <!-- END SINGLE ROOT WRAPPER -->
