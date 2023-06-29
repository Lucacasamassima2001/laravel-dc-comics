<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DC comics</title>
        @vite('resources/js/app.js')
    </head>
    <body>
        <header>
            <h1 class="text-center py-5">Comics</h1>
        </header>
        <main>
            <div class="container d-flex justify-content-center">
                <button><a href="/comics">show the comics</a></button>
            </div>
            {{-- @yield('contents') --}}
        </main>
    </body>
</html>
