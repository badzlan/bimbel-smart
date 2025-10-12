<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            {{ $title ?? 'Dashboard' }} | Bimbel SMART
        </title>
        <link rel="icon" href="{{ asset('images/logo.png') }}">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body
        x-data="{ page: 'dashboard', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
        x-init="
            darkMode = JSON.parse(localStorage.getItem('darkMode'));
            $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
        :class="{'dark bg-gray-900': darkMode === true}">

        @include('components.preloader')

        <div class="flex h-screen overflow-hidden">

            @include('components.sidebar')

            <div class="relative flex flex-1 flex-col overflow-x-hidden overflow-y-auto">
                <div :class="sidebarToggle ? 'block xl:hidden' : 'hidden'" class="fixed z-50 h-screen w-full bg-gray-900/50"></div>

                @include('components.navbar')

                <main>
                    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">

                        @yield('content')

                    </div>
                </main>
                </div>
            </div>
        <script defer src="{{ asset('js/s.js') }}"></script>
        <script defer src="{{ asset('js/bundle.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js'></script>
        @stack('scripts')
    </body>
</html>
