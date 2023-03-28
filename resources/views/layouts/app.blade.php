<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- Reloads page every 15 minutes --}}
{{-- Reloads page every 5 minutes --}}
<meta http-equiv="refresh" content="300">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    <div class="relative">
                    {{ $header }}
                    <div id="clock" class="text-sm text-slate-600 absolute top-1 right-1"></div>
                </div>
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

<script src="https://moment.github.io/luxon/global/luxon.min.js"></script>
<script>
    const clock = document.getElementById("clock");
    function updateTime() {
        const now = luxon.DateTime.local().toFormat('h:mma / MMMM dd, yyyy');
        clock.textContent = now;
    }
    updateTime();
    setInterval(updateTime, 1000);
</script>


    @livewireScripts 
</body>

</html>
