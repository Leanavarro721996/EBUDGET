   <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>iOksi | @yield('pageTitle')</title>
        <link rel="icon" href="{{asset('images/logo.png')}}" />
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        <style>
            html body {
                background-image: url('/images/erb.png');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }

            .setupForm {
                width: 100%;
                max-width: 500px;
                padding: 15px;
                margin: auto;
            }

            .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                transition: 0.3s;
                width: 100%;
            }

            .card:hover {
                box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            }

        </style>

        @stack('stylesheets')
        @livewireStyles
    </head>
    @yield('content')

    </html>


