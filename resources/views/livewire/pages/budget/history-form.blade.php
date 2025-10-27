<div>
    <div class="container-fluid">
        <h4>Transaction History</h4>
        
        <br>
        
        <div class="row">
            <div class="col">
                <div class="card">           
                    <div class="card-body"> 
                        <button type="button" class="btn btn-secondary">All</button>
                        
                        <table class="table">
                            @foreach($History as $Histories)
                            <thead>
                              <tr>
                                <th>Description</th>
                                <th>Created at</th>
                              </tr>                            
                            </thead>                           
                            <tbody>
                              <tr>
                                <td>@if(!empty($Histories->FIRST))
                                    {{ $Histories->process }} first quarter: ₱ {{ number_format($Histories->FIRST) }}<br>
                                @endif
    
                                @if(!empty($Histories->SECOND))
                                    {{ $Histories->process }} second quarter: ₱ {{ number_format($Histories->SECOND) }}<br>
                                @endif
    
                                @if(!empty($Histories->THIRD))
                                    {{ $Histories->process }} third quarter: ₱ {{ number_format($Histories->THIRD) }}<br>
                                @endif
    
                                @if(!empty($Histories->FOURTH))
                                    {{ $Histories->process }} fourth quarter: ₱ {{ number_format($Histories->FOURTH) }}<br>
                                @endif 
                                PPA: {{ $Histories->PPA }}
                                <br>AIP: {{ $Histories->AIPRefCode }}</td>
                                <td>{{ $Histories->created_at }}<br>by {{ $Histories->name }} <br></td>
                              </tr>
                            </tbody>
                            @endforeach 
                          </table>                       
                    </div>
                </div>
            </div>
          </div>
                <!-- Other Content on the Left -->
                {{-- Remaining Balance:  {{$Histories->FIRSTREM + $Histories->SECONDREM + $Histories->THIRDREM + $Histories->FOURTHREM}}  --}}
    {{-- @else
        <div class="text-center">
            <p>Sorry! No results found.</p>
        </div>
    @endif --}} 
    
    {{-- Separate block for $view logic
    @if($History !== null)
        @if($History->isEmpty())
            <div class="text-center">
                <p>Sorry! No results found.</p>
            </div>
        @else
            {{-- Display search results --}}
            {{-- @foreach($History as $result)
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        {{-- Display each search result item --}}
                        {{-- <p>{{ $result->someProperty }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    @endif --}} 
    </div>
</div>

