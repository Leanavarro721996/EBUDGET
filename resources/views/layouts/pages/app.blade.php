<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iOksi | @yield('pageTitle')</title>
    <link rel="icon" href="{{asset('images/logo.png')}}" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    @stack('stylesheets')
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini" >
    <div class="wrapper">
        @include('layouts.pages.header')
        @include('layouts.pages.sidebar')
      
        <div class="content-wrapper">
            <div class="container-xl">
            </div>

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        @yield('pageHeader')
                    </div>
                </div>
            </div>

            {{$slot}}
            <!-- @yield('content') -->
        </div>

        @include('layouts.pages.footer')
    </div>
    <script data-navigate-once src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>



