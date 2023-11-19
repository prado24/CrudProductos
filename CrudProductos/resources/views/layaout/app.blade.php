<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/js/app.js'])
    </head>
    <body>
        @include('partials.navegacion')
        @yield('container')
        @yield('js')
        {{-- @include('partials.menu') --}}
 
        @if (session('status'))
            <div class="container mt-3" id="statusMessage">
            <div class="alert alert-success" role="alert">
            {{ session('status') }}
            </div>
            </div>
            <script>
                setTimeout(function() {
                var statusMessage = document.getElementById('statusMessage');
                if (statusMessage) {
                    statusMessage.classList.add('hidden');
                    setTimeout(function() {
                        statusMessage.style.display = 'none';
                    }, 500);
                
                }
                }, 3000);
            </script>
        @endif
    </body>
</html>
