<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'dashboard')
    <style>
    .table {
    border-color: #808080; /* Replace with your desired border color */
    width: 100%; /* Make the table width 100% of its container */
    max-width: 100%; /* Set maximum width to prevent overflow */
    border-collapse: collapse; /* Collapse table borders */
    }

    .table th, .table td {
        font-size: 12px; /* Adjust the font size for header and data cells */
        border-color: #808080; /* Replace with your desired border color */
        padding: 8px; /* Add padding for better spacing */
    }

    .table thead th {
        background-color: #ccddff; /* Replace with your desired background color */
        color: #808080; /* Optional: Set text color for better contrast */
        border-color: #808080; /* Replace with your desired border color */
    }

    /* Add this style to make the table scrollable on smaller screens */
    @media (max-width: 768px) {
        .tableFixHead {
            overflow-x: auto; /* Make the table horizontally scrollable */
        }

        .tableFixHead thead th {
            position: sticky; /* make the table heads sticky */
            top: 0; /* Stick the table header to the top of the viewport */
            z-index: 1; /* Ensure table header stays above content when scrolling */
            background-color: #ccddff; /* Replace with your desired background color */
        }

        .tableFixHead tbody td {
            border-top: 1px solid #808080; /* Add border between rows */
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
    </style>
   @include('livewire.pages.modal.logout')
   
   <div class="container-fluid no-print">
        <div class="row">
            <div class="col">
                <h4 class="m-0">Dashboard</h4>
            </div>
            <div class="col col-lg-2 text-right">
                <div class="row">
                 <div class="col">
                        <button style="background-color: #FFFFFF;" type="button " class="btn btn-outline-secondary btn-sm print-button__content  js__action--print no-print" id="print" title="Print this page" >
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#6B6262">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z"/>
                            </svg>Print
                        </button>
                 </div>
                </div>
            </div>
        </div>
    </div>
    <br>

     <!-- MODAL -->

     @include('livewire.pages.modal.useraccount')
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <p class="text"><strong>DEPARTMENT:</strong> PROVINCIAL PLANNING AND DEVELOPMENT OFFICE/INFORMATION AND COMMUNICATIONS TECHNOLOGY</p>
            </div>
            <div class="col-6 no-print">
                <form wire:submit="search">
                    <div class="input-group">
                        <input type="text" wire:model="query"  wire:keydown="search" class="form-control" placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>
    </div><br>
    <div class="container-fluid">
     <div class="card">
         <div class="card-body table-responsive">
                <table id="example" class="table table-striped text-center table-bordered tableFixHead">
                    <thead>
                        <tr>
                            <th rowspan="2">AIPPREFCODE</th>
                            <th rowspan="2">PROGRAMS, PROJECTS AND ACTIVITIES</th>
                            <th rowspan="2">RESOURCES NEEDED</th>
                            <th rowspan="2">RESPONSIBLE UNIT/PERSON</th>
                            <th rowspan="2">ACCOUNT CODE</th>
                            <th rowspan="2">OBJECT OF EXPENDITURE</th>
                           <th colspan="8" class="no-print">TIMEFRAME</th>
                            <th rowspan="2">SOURCE OF FUND</th>                   
                        </tr>
                        <tr>
                            <th>FIRST QUARTER</th>
                            <th>Remaining Balance(1st)</th>
                            <th>SECOND QUARTER</th>
                            <th>Remaining Balance(2nd)</th>
                            <th>THIRD QUARTER</th>
                            <th>Remaining Balance(3rd)</th>
                            <th>FOURTH QUARTER</th>
                            <th>Remaining Balance(4th)</th>
                        </tr>
                    </thead>
                    @php
                        $TOTAL_APPROPRIATION = 0;
                        $REMAINING_BALANCE = 0;
                        $FIRST=0;
                        $SECOND=0;
                        $THIRD=0;
                        $FOURTH=0;
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
                                <td>{{ $newcateg->PPA}}</td>
                                <td>{{ $newcateg->RESOURCES}}</td>
                                <td>{{ $newcateg->RESPONSIBLE_UNIT}}</td>
                                <td>{{ $newcateg->ACCOUNT_CODE}}</td>
                                <td>{{ $newcateg->OBJECT_EXPENDITURE}}</td>                
                                <td>₱{{ number_format($newcateg->FIRST, 2, '.', ',') }}</td>
                                <td>₱{{ number_format($newcateg->FIRSTREM, 2, '.', ',') }}</td>
                                <td>₱{{ number_format($newcateg->SECOND, 2, '.', ',') }}</td>
                                <td>₱{{ number_format($newcateg->SECONDREM, 2, '.', ',') }}</td>
                                <td>₱{{ number_format($newcateg->THIRD, 2, '.', ',') }}</td>
                                <td>₱{{ number_format($newcateg->THIRDREM, 2, '.', ',') }}</td>
                                <td>₱{{ number_format($newcateg->FOURTH, 2, '.', ',') }}</td>
                                <td>₱{{ number_format($newcateg->FOURTHREM, 2, '.', ',') }}</td>
                                <td>{{ $newcateg->SOURCE_FUND}}</td>      
                            </tr>
                            @php
                                $TOTAL_APPROPRIATION += $newcateg->TOTAL_APPROPRIATION ;
                                $REMAINING_BALANCE += ($newcateg->FIRST + $newcateg->SECOND + $newcateg->THIRD + $newcateg->FOURTH+$newcateg->FIRSTREM + $newcateg->SECONDREM + $newcateg->THIRDREM + $newcateg->FOURTHREM) ;
                                $FIRST += $newcateg->FIRST;
                                $FIRSTREM += $newcateg->FIRSTREM;
                                $SECOND += $newcateg->SECOND;
                                $SECONDREM += $newcateg->SECONDREM;
                                $THIRD += $newcateg->THIRD;
                                $THIRDREM += $newcateg->THIRDREM;
                                $FOURTH += $newcateg->FOURTH;
                                $FOURTHREM += $newcateg->FOURTHREM;
                                $TOTAL += $newcateg->TOTAL_APPROPRIATION - $newcateg->FIRST - $newcateg->SECOND - $newcateg->THIRD - $newcateg->FOURTH;
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
                                <td style="color: #3A3B3C;"><strong>₱{{ number_format($FIRST, 2, '.', ',') }} </strong></td>
                                <td style="color: #3A3B3C;"><strong>₱{{ number_format($FIRSTREM, 2, '.', ',') }} </strong></td>
                                <td style="color: #3A3B3C;"><strong>₱{{ number_format($SECOND, 2, '.', ',') }} </strong></td>
                                <td style="color: #3A3B3C;"><strong>₱{{ number_format($SECONDREM, 2, '.', ',') }} </strong></td>
                                <td style="color: #3A3B3C;"><strong>₱{{ number_format($THIRD, 2, '.', ',') }} </strong></td>
                                <td style="color: #3A3B3C;"><strong>₱{{ number_format($THIRDREM, 2, '.', ',') }} </strong></td>
                                <td style="color: #3A3B3C;"><strong>₱{{ number_format($FOURTH, 2, '.', ',') }} </strong></td>
                                <td style="color: #3A3B3C;"><strong>₱{{ number_format($FOURTHREM, 2, '.', ',') }} </strong></td>
                                <td style="color: #d60e0e;"><strong>₱{{ number_format($REMAINING_BALANCE, 2, '.', ',') }} </strong></td>
                                {{-- <td> </td>     --}}
                                
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
         </div>
     </div>
 </div>
    <script>
       $('.js__action--print').click(function() {
            window.print();
            return false;
        });
    </script>
</div>
