<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>
            {{ $title ?? 'Sign In' }} | Bimbel SMART
        </title>

        <link rel="icon" href="{{ asset('images/favicon.ico') }}">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <script defer src="{{ asset('js/bundle.js') }}"></script>
    </head>
    <body
        x-data="{ 'darkMode': false }"
        x-init="
            darkMode = JSON.parse(localStorage.getItem('darkMode'));
            $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
        :class="{'dark': darkMode === true}"
    >
        <div class="relative z-1 bg-white p-6 sm:p-0 dark:bg-gray-900">
            <div class="relative flex h-screen w-full flex-col justify-center sm:p-0 lg:flex-row dark:bg-gray-900">

                @yield('content')

            </div>
        </div>
    </body>
</html>
