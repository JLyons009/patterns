<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-50 font-serif text-xl">
        <header class="w-full h-10 pt-2 align-middle mb-10 fixed bg-gray-50 shadow-md">
            <div class="px-2 md:p-0 max-w-3xl mx-auto">
                "Patterns" by Justin Lyons
            </div>
        </header>

        {{ $slot }}

        <script>
            window.onbeforeunload = function () {
                window.scrollTo(0, 0);
            }
        </script>
    </body>
</html>
