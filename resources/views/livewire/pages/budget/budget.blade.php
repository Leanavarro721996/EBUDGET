<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'budget')

    <style>


        /* BREADCRUMP */
        .breadcrumb-item h2 {
        font-size: 20px;
        }
        /* SEPARATOR */
        .separator {
            text-align: center; /* Center the text */
        }

        .line {
            width: 1%; /* Adjust the width of the line as needed */
            height: 1px; /* Adjust the height of the line as needed */
            background-color: #9CA0A4; /* Change the line color */
            margin: 8px auto; /* Adjust the margin for spacing */
        }

        h6 {
            font-family: 'SF Pro Display', sans-serif;
            color: #808080; /* Change the text color */
            font-size: 12px; /* Change the font size */
            margin: 0; /* Remove any default margin */
            padding: 14px 0; /* Adjust the padding for spacing */
        }
        h4 {
            font-family: 'SF Pro Display', sans-serif;
            color: #3A3B3C; /* Change the text color */
        }

        .text {
            font-family: 'SF Pro Display', sans-serif;
            color: #3A3B3C; /* Change the text color */
        }

        .class {
        font-size: 12px; /* You can adjust the size as needed */
            }
            .table {
            border-color: #808080; /* Replace with your desired border color */
            width: 100%; /* Make the table width 100% of its container */
            max-width: 100%; /* Set maximum width to prevent overflow */
            border-collapse: collapse; /* Collapse table borders */
        }

        .table th, .table td {
            font-size: 11px; /* Adjust the font size for header and data cells */
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
 </style>

    @section ('pageHeader')
    <div class="container-fluid">
        <h4>
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" wire:navigate>My Dashboard</a></li>
                <li class="breadcrumb-item"> Work and Financial Plan</li>
            </ol>
        </h4>
    </div>
     @endsection
    <!-- CREATE NEW PPA -->
    <div class="container-fluid">
        <button style="background-color: #206BC4;" type="button" class="btn btn text-white" data-bs-toggle="modal" data-bs-target="#createnew" title="Add Announcement">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFEFE">
                <path d="M3 6c-.55 0-1 .45-1 1v13c0 1.1.9 2 2 2h13c.55 0 1-.45 1-1s-.45-1-1-1H5c-.55 0-1-.45-1-1V7c0-.55-.45-1-1-1zm17-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 9h-3v3c0 .55-.45 1-1 1s-1-.45-1-1v-3h-3c-.55 0-1-.45-1-1s.45-1 1-1h3V6c0-.55.45-1 1-1s1 .45 1 1v3h3c.55 0 1 .45 1 1s-.45 1-1 1z"/>
            </svg> New Program
        </button>
      
        <!-- MODAL -->    
        @include('livewire.pages.modal.edit-modal')
        @include('livewire.pages.modal.delete')
        @include('livewire.pages.modal.useraccount')
        @include('livewire.pages.modal.logout')
        @include('livewire.pages.modal.createnew')
        @include('livewire.pages.modal.deleteall')
    
        <div class="separator" >
            <div class="line"></div>
                <h6 style="color: #9CA0A4;">WORK AND FINANCIAL PLAN LIST</h6>
            <div class="line"></div>
        </div>
        <br>
        <!-- SEARCH BAR -->
        <div class="col-12">
         <form wire:submit="search">
            <div class="input-group">           
                <input type="text" wire:model.live.debounce.200ms="query" class="form-control" placeholder="Search">  
                <div class="input-group-append">
                    <button type="submit" class="btn btn-light" style="background-color: #ffffff;">
                        <i class="fas fa-search" style="color: #6B6262;"></i>   
                    </button>                  
                </div>
            </div>
         </form>
        </div>
      
        <br>
         <!-- TABLE -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                  <table id="example" class="table table-bordered text-center">
                  <thead>
                  <tr>
                    <th rowspan="">AIPREF CODE</th>
                    <th rowspan="">ACCOUNT CODE</th>
                    <th rowspan="">TITLE</th>
                    <th rowspan="">DEPARTMENT</th>
                    <th rowspan="">YEAR</th>
                    <th rowspan="">ACTION</th>
                  </tr>
                  </thead>
                    {{-- @php
                    $Amount = 0;
                    @endphp --}}
                  <tbody>
            
                   @foreach($files as $addnew)
                   <tr>
                        <td>{{ $addnew->AIPRefCode }}</td>
                        <td>{{ $addnew->ACCOUNT_CODE }}</td>
                        <td>{{ $addnew->Title }}</td>
                        <td> {{ $addnew->Department }}</td>
                        <td>{{ $addnew->Year }}</td>
                        <td class="no-print">
                        <div class="btn-group dropend show">
                            <a href="#" class="btn btn-sm dropdown-toggle text-white" style="background-color: #206BC4; width: 50%;" data-toggle="dropdown" aria-expanded="true">
                                Actions
                            </a>
                            <ul class="dropdown-menu">
                                <li class="text-center"><strong>Timeframe</strong></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a href="{{ route('view', ['id' => $addnew->id]) }}" class="dropdown-item {{ Route::is('view') ? 'active' : '' }}" wire:navigate>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#6B6262">
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                                        </svg>
                                        <span wire:click="edit_view({{ $addnew->id }})">View</span>
                                    </a>
                                    <a href="#" wire:click.prevent ="edit({{ $addnew->id }})" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Edit_bud" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#6B6262">
                                            <rect fill="none" height="24" width="24"/>
                                            <path d="M3,10h11v2H3V10z M3,8h11V6H3V8z M3,16h7v-2H3V16z M18.01,12.87l0.71-0.71c0.39-0.39,1.02-0.39,1.41,0l0.71,0.71 c0.39,0.39,0.39,1.02,0,1.41l-0.71,0.71L18.01,12.87z M17.3,13.58l-5.3,5.3V21h2.12l5.3-5.3L17.3,13.58z"/>
                                        </svg>
                                        Edit
                                    </a>

                                    <a href="#" wire:click.prevent ="edit({{ $addnew->id }})" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteall" title="Delete">
                                        <i class="fas fa-trash"></i>Delete
                                    </a>
                                </li>
                             </ul>
                      </div>           
                      </td>  
                   </tr>          
                   @endforeach
               
                    @if($files !== null)
                    @if($files->isEmpty())
                        <tr>
                            <td colspan="16" style="text-align: center; vertical-align: middle; font-size: 16px;">
                                <p>Sorry! No results found.</p>
                              
                            </td>
                        </tr> 
                     @else 
                      
                        @foreach($files as $result)
                          
                        @endforeach 
                    @endif
                    @endif
                    </tbody>
                    </table>
             </div>
          </div>
        </div>
 




    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('created', (event) => {
            $('#Createnew').modal('hide');
        });
        })
    </script>
</div>
