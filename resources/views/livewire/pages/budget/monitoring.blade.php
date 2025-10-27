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
            
            <h4 class="m-0">Monitoring</h4>
            <p class="text"><strong>DEPARTMENT:</strong> PROVINCIAL PLANNING AND DEVELOPMENT OFFICE/INFORMATION AND COMMUNICATIONS TECHNOLOGY</p>
                     

            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card bg-primary">
                                    <div class="card-header text-center">
                                    First Quarter
                                    </div>
                                    <div class="card-body">
                                   
                                    <p class="card-text">TOTAL: ₱ {{ number_format($totalFirst) }} <br> REMAINING BALANCE: ₱ {{ number_format($totalFirstRem) }} </p>
                                  
                          
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-success">
                                    <div class="card-header text-center">
                                        Second Quarter
                                    </div>
                                    <div class="card-body">
                                  
                                    <p class="card-text">TOTAL: ₱ {{ number_format($totalSecond) }} <br> REMAINING BALANCE: ₱ {{ number_format($totalSecondRem) }}  </p>
                             
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-secondary">
                                    <div class="card-header text-center">
                                        Third Quarter
                                    </div>
                                    <div class="card-body">
                                    
                                    <p class="card-text">TOTAL: ₱{{ number_format($totalThird) }} <br> REMAINING BALANCE: ₱ {{ number_format($totalThirdRem) }} </p>
                                   
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card bg-danger">
                                    <div class="card-header text-center">
                                        Fourth Quarter
                                    </div>
                                    <div class="card-body">
                                 
                                    <p class="card-text">TOTAL: ₱ {{ number_format($totalFourth) }} <br> REMAINING BALANCE: ₱ {{ number_format($totalFourthRem) }} </p>
                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

     <!-- MODAL -->
     {{-- @include('livewire.pages.modal.export') --}}
     @include('livewire.pages.modal.useraccount')
    

         <!-- TABLE -->
    
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <details>
                    <summary>LIST OF PROGRAMS, PROJECTS, AND ACTIVITIES</summary>
                    <div class="card-body">
               
    <table id="example" class="table table-striped text-center table-bordered tableFixHead">
        <thead>
            <tr>
                <th rowspan="2">AIPPREFCODE</th>
                <th rowspan="2">PROGRAMS, PROJECTS AND ACTIVITIES</th>
                <th rowspan="2">RESOURCES NEEDED</th>
                <th rowspan="2">RESPONSIBLE UNIT/PERSON</th>
                <th rowspan="2">ACCOUNT CODE</th>
                <th rowspan="2">OBJECT OF EXPENDITURE</th>
                <th rowspan="2">YEAR</th>
                <th colspan="4">TIMEFRAME</th>
                <th rowspan="2">SOURCE OF FUND</th>                   
            </tr>
            <tr>
                <th>1st QUARTER</th>
                <th>2nd QUARTER</th>
                <th>3rd QUARTER</th>
                <th>4th QUARTER</th>
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
                    <td>{{ $newcateg->PPA}}</td>
                    <td>{{ $newcateg->RESOURCES}}</td>
                    <td>{{ $newcateg->RESPONSIBLE_UNIT}}</td>
                    <td>{{ $newcateg->ACCOUNT_CODE}}</td>
                    <td>{{ $newcateg->OBJECT_EXPENDITURE}}</td>    
                    <td>{{ $newcateg->Year}}</td>              
                    <td>₱{{ number_format($newcateg->FIRSTREM, 2, '.', ',') }}</td>
                    <td>₱{{ number_format($newcateg->SECONDREM, 2, '.', ',') }}</td>
                    <td>₱{{ number_format($newcateg->THIRDREM, 2, '.', ',') }}</td>
                    <td>₱{{ number_format($newcateg->FOURTHREM, 2, '.', ',') }}</td>                    
                    <td>{{ $newcateg->SOURCE_FUND}}</td>      
                </tr>
            
                
                @php
                    $TOTAL_APPROPRIATION += $newcateg->TOTAL_APPROPRIATION ;
                    $REMAINING_BALANCE += ($newcateg->FIRST + $newcateg->SECOND + $newcateg->THIRD + $newcateg->FOURTH) ;
                    $FIRSTREM += $newcateg->FIRSTREM;
                    $SECONDREM += $newcateg->SECONDREM;
                    $THIRDREM += $newcateg->THIRDREM;
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
                        <td> </td>
                    <td style="color: #3A3B3C;"><strong>₱{{ number_format($FIRSTREM, 2, '.', ',') }} </strong></td>
                    <td style="color: #3A3B3C;"><strong>₱{{ number_format($SECONDREM, 2, '.', ',') }} </strong></td>
                    <td style="color: #3A3B3C;"><strong>₱{{ number_format($THIRDREM, 2, '.', ',') }} </strong></td>
                    <td style="color: #3A3B3C;"><strong>₱{{ number_format($FOURTHREM, 2, '.', ',') }} </strong></td>
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
</div>
</details>
</div>

</div>

</div>
        <!-- TABLE OF DEDUCTIONS -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <details>
                <summary>DETAILS OF DEDUCTIONS</summary>
                <div class="card-body">
                    <table id="example" class="table table-bordered">
                        <thead>
                            <tr style="text-align: center ">
                                <th rowspan="">Quarter</th>
                                <th rowspan="">PR No.</th>
                                <th rowspan="">Title</th>
                                <th rowspan="">Date</th>
                                <th rowspan="">Deduction</th>
                                <th rowspan="">Status</th>
                             
                            </tr>
                        </thead>
                        @php
                        $Amount = 0;
                        @endphp 
                        <tbody>
                         
                            @foreach($deduction as $detailsdeduction)
                                <tr style="text-align: center " >
                                    <td >{{ $detailsdeduction->Quarter }}</td>
                                    <td >{{ $detailsdeduction->PR_No }}</td>
                                    <td >{{ $detailsdeduction->Title }}</td>
                                    <td >{{ $detailsdeduction->Date }}</td>
                    
                                    <td>{{ number_format($detailsdeduction->Amount, 2, '.', ',') }}</td>

                                    <td>
                                        @if($detailsdeduction->Status === 'CANCELLED')
                                            <span class="badge bg-danger p-2 text-xs" style="font-size: 0.8rem;" >{{ $detailsdeduction->Status }}</span>
                                        @else
                                            <span class="badge bg-success">{{ $detailsdeduction->Status }}</span>
                                        @endif
                                    </td>
                                    
                                </tr>
                                @php
                                    // Accumulate the Amount
                                    $Amount += $detailsdeduction->Amount;
                                @endphp
                         
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
                            @endif
                            @if($deduction !== null)
                            @if($deduction->isEmpty())
                                <tr>
                                    <td colspan="16" style="text-align: center; vertical-align: middle; font-size: 16px;">
                                        <p>Sorry! No results found.</p>
                                        {{-- You can also display the message from the 'noResultsFound' event here --}}
                                    </td>
                                </tr>
                            @else
                                {{-- Display your search results here --}}
                                @foreach($deduction as $result)
                                    {{-- Display each search result item --}}
                                @endforeach
                            @endif
                        @endif
                        </tfoot>  
                    </table>
</div>
</details>
</div>

</div>

</div>
        <!-- TABLE OF ADDING-->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <details>
                <summary>DETAILS OF ADDING</summary>
                <div class="card-body">
                    <table id="example" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Created_at</th>
                                <th>First Quarter</th>
                                <th>Second Quarter</th>
                                <th>Third Quarter</th>
                                <th>Fourth Quarter</th>
                            </tr>
                        </thead>
                        @php
                        $FIRSTadd = 0;
                        $SECONDadd = 0;
                        $THIRDadd = 0;
                        $FOURTHadd = 0;
                        @endphp
                        <tbody>
                            @if(!is_null($add) && count($add) > 0)
                                @foreach($add as $addingdetails)
                                    <tr wire:key = "{{ $addingdetails->id }}">
                                        <td>{{ $addingdetails->created_at }}</td>
                                        <td>{{ $addingdetails->FIRSTadd }}</td>
                                        <td>{{ $addingdetails->SECONDadd }}</td>
                                        <td>{{ $addingdetails->THIRDadd }}</td>
                                        <td>{{ $addingdetails->FOURTHadd }}</td>
                                    </tr>
                                    @php
                                    // Accumulate the amounts
                                    $FIRSTadd += $addingdetails->FIRSTadd;
                                    $SECONDadd += $addingdetails->SECONDadd;
                                    $THIRDadd += $addingdetails->THIRDadd;
                                    $FOURTHadd += $addingdetails->FOURTHadd;
                                    @endphp
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr style="text-align: center ">
                                <td style="color:#ff0000;"><strong>Total</strong></td>
                                <td style="color: #ff0000;"><strong>{{ number_format($FIRSTadd, 2, '.', ',') }}</strong></td>
                                <td style="color: #ff0000;"><strong>{{ number_format($SECONDadd, 2, '.', ',') }}</strong></td>
                                <td style="color: #ff0000;"><strong>{{ number_format($THIRDadd, 2, '.', ',') }}</strong></td>
                                <td style="color: #ff0000;"><strong>{{ number_format($FOURTHadd, 2, '.', ',') }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    
                </div>
                    </details>
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
