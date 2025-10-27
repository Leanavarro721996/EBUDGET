<style>
    /* TABLE */
        /* Add this style to make the header cells (th) smaller */
        .custom-text {
            font-size: 14px; /* You can adjust the size as needed */
        }

        .tableFixHead {
        overflow-y: auto; /* make the table scrollable if height is more than 200 px  */
        height: 200px; /* gives an initial height of 200px to the table */
        }
        .tableFixHead thead th {
            position: sticky; /* make the table heads sticky */
            top: 1px; /* table head will be placed from the top of the table and sticks to it */
        }
        .tableFixHead thead th {
            position: sticky; /* make the table heads sticky */
            top: 1px; /* table head will be placed from the top of the table and sticks to it */
        }

        /* TABLE */
        .table {
            border-color: #808080; /* Replace with your desired border color */
        }
        
        .table th {
            font-size: 10px; /* Adjust the font size for header cells */
            border-color: #808080; /* Replace with your desired border color */
        }

        /* Add this style to make the data cells (td) smaller */
        .table td {
            font-size: 10px; /* Adjust the font size for data cells */
            border-color: #808080; /* Replace with your desired border color */
        }

        .table thead th {
            background-color:  #ccddff; /* Replace with your desired background color */
            color:  #808080; /* Optional: Set text color for better contrast */
            border-color: #808080; /* Replace with your desired border color */
        }

        h4 {
            font-family: 'SF Pro Display', sans-serif;
            color: #3A3B3C; /* Change the text color */
        }

        .text {
            font-family: 'SF Pro Display', sans-serif;
            color: #3A3B3C; /* Change the text color */
        }
     
    </style>
            <!-- TABLE-->
  <table id="example" class="table table-striped text-center table-bordered tableFixHead">
    <thead>
        <tr>
            <th rowspan="2">TOTAL AUTHORIZED APPROPRIATION</th>
            <th rowspan="2">AIPPREFCODE</th>
            <th rowspan="2">PROGRAMS, PROJECTS AND ACTIVITIES</th>
            <th rowspan="2">RESOURCES NEEDED</th>
            <th rowspan="2">RESPONSIBLE UNIT/PERSON</th>
            <th rowspan="2">SUCCESS INDICATOR</th>
            <th rowspan="2">MEANS OF VERIFICATION</th>
            <th rowspan="2">ACCOUNT CODE</th>
            <th rowspan="2">OBJECT OF EXPENDITURE</th>
            <th rowspan="2">SOURCE OF FUND</th>
            <th colspan="4">TIMEFRAME</th>
            <th rowspan="2">TOTAL</th>
            <th rowspan="2">REMAINING BALANCE</th>
            
        </tr>
        <tr>
            <th>1st QUARTER</th>
            <th>2nd QUARTER</th>
            <th>3rd QUARTER</th>
            <th>4th QUARTER</th>
        </tr>
    </thead>
    <tbody>
        @foreach($view as $newcateg)
        <tr>
            <td>₱{{ number_format($newcateg->TOTAL_APPROPRIATION, 2, '.', ',') }}</td>
            <td>{{ $newcateg->AIPRefCode}}</td>
            <td>{{ $newcateg->PPA}}</td>
            <td>{{ $newcateg->RESOURCES}}</td>
            <td>{{ $newcateg->RESPONSIBLE_UNIT}}</td>
            <td>{{ $newcateg->SUCCESS_INDICATOR}}</td>
            <td>{{ $newcateg->MEANS_VERIFICATION}}</td>
            <td>{{ $newcateg->ACCOUNT_CODE}}</td>
            <td>{{ $newcateg->OBJECT_EXPENDITURE}}</td>  
            <td>{{ $newcateg->SOURCE_FUND}}</td>                 
            <td>₱{{ number_format($newcateg->FIRST, 2, '.', ',') }}</td>
            <td>₱{{ number_format($newcateg->SECOND, 2, '.', ',') }}</td>
            <td>₱{{ number_format($newcateg->THIRD, 2, '.', ',') }}</td>
            <td>₱{{ number_format($newcateg->FOURTH, 2, '.', ',') }}</td>
            <td>₱{{ number_format($newcateg->FIRST + $newcateg->SECOND + $newcateg->THIRD + $newcateg->FOURTH, 2, '.', ',') }}</td>
            <td>₱{{ number_format($newcateg->TOTAL_APPROPRIATION - ($newcateg->FIRST + $newcateg->SECOND + $newcateg->THIRD + $newcateg->FOURTH), 2, '.', ',') }}</td>
        </tr>
        @endforeach    
    </tbody> 
</table> 