<div>
    {{-- @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'dashboard') --}}

    <style>
        .table {
            border-color: #808080;
            /* Replace with your desired border color */
            width: 100%;
            /* Make the table width 100% of its container */
            max-width: 100%;
            /* Set maximum width to prevent overflow */
            border-collapse: collapse;
            /* Collapse table borders */
        }

        .table th,
        .table td {
            font-size: 12px;
            /* Adjust the font size for header and data cells */
            border-color: #808080;
            /* Replace with your desired border color */
            padding: 8px;
            /* Add padding for better spacing */
        }

        .table thead th {
            background-color: #ccddff;
            /* Replace with your desired background color */
            color: #808080;
            /* Optional: Set text color for better contrast */
            border-color: #808080;
            /* Replace with your desired border color */
        }

        /* Add this style to make the table scrollable on smaller screens */
        @media (max-width: 768px) {
            .tableFixHead {
                overflow-x: auto;
                /* Make the table horizontally scrollable */
            }

            .tableFixHead thead th {
                position: sticky;
                /* make the table heads sticky */
                top: 0;
                /* Stick the table header to the top of the viewport */
                z-index: 1;
                /* Ensure table header stays above content when scrolling */
                background-color: #ccddff;
                /* Replace with your desired background color */
            }

            .tableFixHead tbody td {
                border-top: 1px solid #808080;
                /* Add border between rows */
            }

        }

        .card-body {
            font-family: 'SF Pro Display', sans-serif;
        }

        @media print {
            @page {
                size: landscape;
            }

        }

        .no-print {
            margin-left: auto;
            /* Optional if flexbox doesn't fully align */
            margin-right: 0;
        }

        .left-align {
            float: left;
        }

    </style>

    @include('livewire.pages.modal.lessaugment')
    @include('livewire.pages.modal.addaugment')
    @include('livewire.pages.modal.lesssupp')

    <div class="container-fluid">
        <h4 class="m-0">Augmentation</h4>
        <p class="text"><strong>DEPARTMENT:</strong> PROVINCIAL PLANNING AND DEVELOPMENT OFFICE/INFORMATION AND
            COMMUNICATIONS TECHNOLOGY</p>
        <div class="row">
            <div class="col-md-12 ml-auto">
                <form wire:submit="search">
                    <div class="input-group">
                        <input type="text" wire:model="query" wire:keydown="search" class="form-control"
                            placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>
    </div>
<br>
<!-- TABLE -->
    <div class="card">
        <div class="card-body table-responsive">
            <table id="example" class="table table-striped text-center table-bordered tableFixHead">
                <thead>
                    <tr>
                        <th rowspan="2">AIPPREFCODE</th>
                        <th rowspan="2">ACCOUNT CODE</th>
                        <th rowspan="2">PROGRAMS, PROJECTS AND ACTIVITIES</th>
                        <th rowspan="2">RESOURCES NEEDED</th>
                        <th rowspan="2">RESPONSIBLE UNIT/PERSON</th>

                        <th rowspan="2">OBJECT OF EXPENDITURE</th>
                        <th colspan="4">TIMEFRAME</th>
                        <th rowspan="2">SOURCE OF FUND</th>
                        <th colspan="4">SUPPLEMENTAL</th>
                        <th rowspan="2">ACTION</th>
                    </tr>
                    <tr>
                        <th>1st QUARTER</th>
                        <th>2nd QUARTER</th>
                        <th>3rd QUARTER</th>
                        <th>4th QUARTER</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                    </tr>
                </thead>
                @php
                $TOTAL_APPROPRIATION = 0;
                $REMAINING_BALANCE = 0;
                $FIRSTREM=0;
                $SECONDREM=0;
                $THIRDREM=0;
                $FOURTHREM=0;
                $TOTAL=0;
                @endphp

                <tbody>
                    @foreach($view as $newcateg)
                    <tr>
                        <td>{{ $newcateg->AIPRefCode}}</td>
                        <td>{{ $newcateg->ACCOUNT_CODE}}</td>
                        <td>{{ $newcateg->PPA}}</td>
                        <td>{{ $newcateg->RESOURCES}}</td>
                        <td>{{ $newcateg->RESPONSIBLE_UNIT}}</td>

                        <td>{{ $newcateg->OBJECT_EXPENDITURE}}</td>
                        <td>₱{{ number_format($newcateg->FIRSTREM, 2, '.', ',') }}</td>
                        <td>₱{{ number_format($newcateg->SECONDREM, 2, '.', ',') }}</td>
                        <td>₱{{ number_format($newcateg->THIRDREM, 2, '.', ',') }}</td>
                        <td>₱{{ number_format($newcateg->FOURTHREM, 2, '.', ',') }}</td>
                        <td>{{ $newcateg->SOURCE_FUND}}</td>
                        @php
                        $found = false;
                        @endphp
                        @foreach($supp as $supplemental)
                        @if($newcateg->id == $supplemental->category_id)
                        @php $found = true; @endphp
                        <td>₱{{ number_format($supplemental->FIRST1, 2, '.', ',') }}</td>
                        <td>₱{{ number_format($supplemental->SECOND2, 2, '.', ',') }}</td>
                        <td>₱{{ number_format($supplemental->THIRD3, 2, '.', ',') }}</td>
                        <td>₱{{ number_format($supplemental->FOURTH4, 2, '.', ',') }}</td>
                        @endif
                        @endforeach

                        @if (!$found)
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        @endif
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm dropdown-toggle text-white" id="dropdownMenuButton"
                                    style="background-color: #206BC4; width: 50%;" data-toggle="dropdown"
                                    aria-expanded="true">
                                    Actions
                                </button>
                                <ul class="dropdown-menu pre-scrollable">
                                    <li>
                                        <a href="#"
                                            wire:click.prevent="edit({{ $newcateg->id }}, '{{ $newcateg->FIRST }}', '{{ $newcateg->SECOND }}', '{{ $newcateg->THIRD }}', '{{ $newcateg->FOURTH }}', '{{ $newcateg->created_at }}')"
                                            class="dropdown-item" data-bs-toggle="modal" data-bs-target="#lessaugment"
                                            title="augment">
                                            <img src="{{ asset('images/less.png') }}"
                                                style="width: 20px; height: 20px; margin-right: 9px;">Less Augmentation
                                        </a>

                                        <a href="#"
                                            wire:click.prevent="edit({{ $newcateg->id }}, '{{ $newcateg->FIRST }}', '{{ $newcateg->SECOND }}', '{{ $newcateg->THIRD }}', '{{ $newcateg->FOURTH }}', '{{ $newcateg->created_at }}')"
                                            class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addaugment"
                                            title="augment">
                                            <img src="{{ asset('images/add.png') }}"
                                                style="width: 20px; height: 20px; margin-right: 9px;">Add Augmentation
                                        </a>

                                        @foreach($supp as $supplemental)
                                        @if($newcateg->id == $supplemental->category_id)
                                        <a href="#" wire:click.prevent="editsupp({{ $supplemental->id }})"
                                            class="dropdown-item" data-bs-toggle="modal" data-bs-target="#lesssupp">
                                            <img src="{{ asset('images/less.png') }}"
                                                style="width: 20px; height: 20px; margin-right: 9px;">Less Supplemental
                                        </a>
                                        @endif
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @php
                    $TOTAL_APPROPRIATION += $newcateg->TOTAL_APPROPRIATION ;
                    $REMAINING_BALANCE += ($newcateg->FIRST + $newcateg->SECOND + $newcateg->THIRD + $newcateg->FOURTH) ;
                    $FIRSTREM += $newcateg->FIRSTREM;
                    $SECONDREM += $newcateg->SECONDREM;
                    $THIRDREM += $newcateg->THIRDREM;
                    $FOURTHREM += $newcateg->FOURTHREM;
                    $TOTAL += $newcateg->TOTAL_APPROPRIATION - $newcateg->FIRST - $newcateg->SECOND - $newcateg->THIRD -
                    $newcateg->FOURTH;
                    @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    @if($view->isNotEmpty())
                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td style="color: #3A3B3C;"><strong>₱{{ number_format($FIRSTREM, 2, '.', ',') }} </strong></td>
                        <td style="color: #3A3B3C;"><strong>₱{{ number_format($SECONDREM, 2, '.', ',') }} </strong></td>
                        <td style="color: #3A3B3C;"><strong>₱{{ number_format($THIRDREM, 2, '.', ',') }} </strong></td>
                        <td style="color: #3A3B3C;"><strong>₱{{ number_format($FOURTHREM, 2, '.', ',') }} </strong></td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>

                    </tr>
                    @endif
                    @if($view !== null)
                    @if($view->isEmpty())
                    <tr>
                        <td colspan="16" style="text-align: center; vertical-align: middle; font-size: 16px;">
                            <p>Sorry! No results found.</p>
                            {{-- You can also display the message from the 'noResultsFound' event here --}}
                        </td>
                    </tr>
                    @else
                    {{-- Display your search results here --}}
                    @foreach($view as $result)
                    {{-- Display each search result item --}}
                    @endforeach
                    @endif
                    @endif
                </tfoot>
            </table>
            @include('livewire.pages.modal.augment')
        </div>
    </div>
</div>





