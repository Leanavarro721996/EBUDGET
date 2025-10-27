<div>
    <style>
        .table {
            border-color: #808080;
            /* Replace with your desired border color */
        }

        .table th {
            font-size: 12px;
            /* Adjust the font size for header cells */
            border-color: #808080;
            /* Replace with your desired border color */
        }

        /* Add this style to make the data cells (td) smaller */
        .table td {
            font-size: 12px;
            /* Adjust the font size for data cells */
            border-color: #808080;
            /* Replace with your desired border color */
        }

        .table thead th {
            background-color: #ccddff;
            /* Replace with your desired background color */
            color: #808080;
            /* Optional: Set text color for better contrast */
            border-color: #808080;
            /* Replace with your desired border color */
        }

        /* CARD */
        .card-body {
            font-family: 'SF Pro Display', sans-serif;
        }

        @media print {
            @page {
                size: landscape;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
                border: 1px solid #ddd;
            }

            @media (max-width: 600px) {

                th,
                td {
                    display: block;
                    width: 100%;
                }
            }

            .footer-red {
                color: #ff0000;
            }

            td {
                word-wrap: break-word;
                /* Allows breaking long words */
                overflow: hidden;
                /* Hides overflow */
                text-overflow: ellipsis;
                /* Shows ellipsis (...) for overflow */
            }
        }

    </style>
    @section ('pageHeader')
    <div class="container-fluid no-print">
        <h4>
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" wire:navigate>My Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('budget')}}" wire:navigate>Work and Financial Plan</a></li>
                <li class="breadcrumb-item">View</li>
            </ol>
        </h4>
    </div>
    @endsection

    @include('livewire.pages.modal.deleteall')
    @include('livewire.pages.modal.lesswfp')

    <div class="container-fluid">
        <div class="card text-white no-print" style="background-color: #5E8CD2;">
            <span class="m-2"><strong>AIPREFCODE:</strong> {{ $AIPRefCode }}<br><strong>ACCOUNTCODE:</strong>
                {{$ACCOUNT_CODE}}<strong><br>TITLE:</strong> {{ $Title  }}
                <br><strong>DEPARTMENT:</strong> {{ $Department }}<strong><br>YEAR:</strong> {{ $Year }}</span>
            <p class="class">
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#ffffff">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                </svg>
                {{ $addnew->created_at->diffForHumans() }}</p>
        </div>

        <!-- BUTTON FOR PPA -->
        <div class="container-fluid no-print">
            <div class="row">
                <div class="col text-Left">
                    <button style="background-color: #206BC4;" type="button" class="btn btn text-white"
                        data-bs-toggle="modal" data-bs-target="#addcategories" title="Add Announcement">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                            fill="#FFFEFE">
                            <path
                                d="M3 6c-.55 0-1 .45-1 1v13c0 1.1.9 2 2 2h13c.55 0 1-.45 1-1s-.45-1-1-1H5c-.55 0-1-.45-1-1V7c0-.55-.45-1-1-1zm17-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 9h-3v3c0 .55-.45 1-1 1s-1-.45-1-1v-3h-3c-.55 0-1-.45-1-1s.45-1 1-1h3V6c0-.55.45-1 1-1s1 .45 1 1v3h3c.55 0 1 .45 1 1s-.45 1-1 1z" />
                        </svg>Create PPA
                    </button>
                </div>

            </div>
        </div>


        <!-- MODAL -->
        <div class="separator no-print">
            <div class="line"></div>
            <h6 style="color: #9CA0A4;">WORK AND FINANCIAL PLAN INDIVIDUAL OVERVIEW</h6>
            <div class="line"></div>
        </div>

        <!-- TABLE -->
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">CATEGORY</th>
                            <th rowspan="2">AIPPREFCODE</th>
                            <th rowspan="2">ACCOUNT CODE</th>
                            <th rowspan="2">PROGRAMS, PROJECTS AND ACTIVITIES</th>
                            <th rowspan="2">RESOURCES NEEDED</th>
                            <th rowspan="2">RESPONSIBLE UNIT/PERSON</th>
                            <th rowspan="2">OBJECT OF EXPENDITURE</th>
                            <th rowspan="2">YEAR</th>
                            <th colspan="4">TIMEFRAME</th>
                            <th rowspan="2">Source OF FUND</th>
                            <th rowspan="2">Notes</th>
                            <th rowspan="2" class="no-print">ACTION</th>
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
                    $FIRSTREM=0;
                    $SECONDREM=0;
                    $THIRDREM=0;
                    $FOURTHREM=0;
                    @endphp

                    <tbody>
                        @foreach($view as $newcateg)
                        <tr wire:key="{{ $newcateg->id}}">
                            <td>{{ $newcateg->CATEGORY}}</td>
                            <td>{{ $newcateg->AIPRefCode}}</td>
                            <td>{{ $newcateg->ACCOUNT_CODE}}</td>
                            <td>{{ $newcateg->PPA}}</td>
                            <td>{{ $newcateg->RESOURCES}}</td>
                            <td>{{ $newcateg->RESPONSIBLE_UNIT}}</td>
                            <td>{{ $newcateg->OBJECT_EXPENDITURE}}</td>
                            <td>{{ $newcateg->Year}}</td>
                            <td>₱{{ number_format($newcateg->FIRSTREM, 2, '.', ',') }}</td>
                            <td>₱{{ number_format($newcateg->SECONDREM, 2, '.', ',') }}</td>
                            <td>₱{{ number_format($newcateg->THIRDREM, 2, '.', ',') }}</td>
                            <td>₱{{ number_format($newcateg->FOURTHREM, 2, '.', ',') }}</td>

                            <td>{{ $newcateg->SOURCE_FUND}}</td>
                            <td>{{ $newcateg->NOTE}}</td>

                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm dropdown-toggle text-white"
                                        id="dropdownMenuButton" style="background-color: #206BC4; width: 50%;"
                                        data-toggle="dropdown" aria-expanded="true">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu pre-scrollable">
                                        <li>
                                            <a href="{{ route('viewactivity', ['id' => $newcateg->id]) }}"
                                                class="dropdown-item {{ Route::is('viewactivity') ? 'active' : '' }}"
                                                wire:navigate>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                    viewBox="0 0 24 24" width="24px" fill="#6B6262">
                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
                                                </svg>
                                                <span wire:click="edit_view({{ $newcateg->id }})">View</span>
                                            </a>

                                            <a href="#"
                                                wire:click.prevent="edit({{ $newcateg->id }}, '{{ $newcateg->FIRST }}', '{{ $newcateg->SECOND }}', '{{ $newcateg->THIRD }}', '{{ $newcateg->FOURTH }}', '{{ $newcateg->created_at }}')"
                                                class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#calculateadd" title="Update">
                                                <img src="{{ asset('images/cash.png') }}"
                                                    style="width: 20px; height: 20px; margin-right: 9px;">Add Amount
                                            </a>
                                            <a href="#"
                                                wire:click.prevent="edit({{ $newcateg->id }}, '{{ $newcateg->FIRST }}', '{{ $newcateg->SECOND }}', '{{ $newcateg->THIRD }}', '{{ $newcateg->FOURTH }}', '{{ $newcateg->created_at }}')"
                                                class="dropdown-item" data-bs-toggle="modal" data-bs-target="#lesswfp"
                                                title="augment">
                                                <img src="{{ asset('images/less.png') }}"
                                                    style="width: 20px; height: 20px; margin-right: 9px;">Less Amount
                                            </a>
                                            <a href="#"
                                                wire:click.prevent="edit({{ $newcateg->id }}, '{{ $newcateg->PPA }}', '{{ $newcateg->RESOURCES }}', '{{ $newcateg->RESPONSIBLE_UNIT }}', '{{ $newcateg->OBJECT_EXPENDITURE }}', '{{ $newcateg->SOURCE_FUND }}')"
                                                class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#updatecategories">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                    viewBox="0 0 24 24" width="24px" fill="#6B6262">
                                                    <rect fill="none" height="24" width="24" />
                                                    <path
                                                        d="M3,10h11v2H3V10z M3,8h11V6H3V8z M3,16h7v-2H3V16z M18.01,12.87l0.71-0.71c0.39-0.39,1.02-0.39,1.41,0l0.71,0.71c0.39,0.39,0.39,1.02,0,1.41l-0.71,0.71L18.01,12.87z M17.3,13.58l-5.3,5.3V21h2.12l5.3-5.3L17.3,13.58z" />
                                                </svg>Update
                                            </a>
                                            <a href="#"
                                                wire:click.prevent="edit({{ $newcateg->id }}, '{{ $newcateg->FIRST }}', '{{ $newcateg->SECOND }}', '{{ $newcateg->THIRD }}', '{{ $newcateg->FOURTH }}', '{{ $newcateg->created_at }}')"
                                                class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteall"
                                                title="Delete">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>

                                        </li>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                        @php

                        $FIRSTREM += $newcateg->FIRSTREM;
                        $SECONDREM += $newcateg->SECONDREM;
                        $THIRDREM += $newcateg->THIRDREM;
                        $FOURTHREM += $newcateg->FOURTHREM;

                        @endphp
                        @endforeach
                    </tbody>
                    <tfoot class="table table-bordered" style="color: #ff0000;">
                        <tr>
                            <td style="color: #ff0000;"><strong>Total </strong></td>
                            <td style="color: #ff0000;"><strong>--- </strong> </td>
                            <td style="color: #ff0000;"><strong>--- </strong> </td>
                            <td style="color: #ff0000;"><strong>--- </strong> </td>
                            <td style="color: #ff0000;"><strong>--- </strong> </td>
                            <td style="color: #ff0000;"><strong>--- </strong> </td>
                            <td style="color: #ff0000;"><strong>--- </strong> </td>
                            <td style="color: #ff0000;"><strong>--</strong> </td>
                            <td style="color: #ff0000;"><strong>₱{{ number_format($FIRSTREM, 2, '.', ',') }} </strong>
                            </td>
                            <td style="color: #ff0000;"><strong>₱{{ number_format($SECONDREM, 2, '.', ',') }} </strong>
                            </td>
                            <td style="color: #ff0000;"><strong>₱{{ number_format($THIRDREM, 2, '.', ',') }} </strong>
                            </td>
                            <td style="color: #ff0000;"><strong>₱{{ number_format($FOURTHREM, 2, '.', ',') }} </strong>
                            </td>
                            <td style="color: #ff0000;"><strong>---</strong> </td>
                            <td style="color: #ff0000;"><strong>---</strong> </td>

                            <td class="no-print"> </td>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- MODAL -->
        @include('livewire.pages.modal.delete')
        @include('livewire.pages.modal.calculateadd')
        @include('livewire.pages.modal.addcategories')
        @include('livewire.pages.modal.less')
        @include('livewire.pages.modal.updatecategories')
    </div>

    <script>
        $('.js__action--print').click(function () {
            window.print();
            return false;
        });

    </script>


</div>
