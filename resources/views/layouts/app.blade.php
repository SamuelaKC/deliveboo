<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://js.braintreegateway.com/web/dropin/1.10.0/js/dropin.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet"
        />

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <script type="application/javascript" src="path/to/chartjs/dist/chart.js"></script>
    </head>
    <body>
        <div id="app">
            <header>
                @include('layouts.navbar')
            </header>

            <main class="py-4">
                @yield('content')
            </main>

            <footer>
                @include('layouts.footer')
            </footer>
        </div>
    </body>
</html>
