<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>



<style>
html, body {
  width: 100%;
  height:100%;
}

body {
    /* background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab); */
    background: linear-gradient(109.6deg, rgba(0, 0, 0, 1) 11.2%, rgb(37, 36, 36) 78.9%);
    background-size: 400% 400%;
    animation: gradient 10s ease infinite;
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}
</style>



<script>

</script>








</head>

<body class="antialiased">





    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center selection:bg-indigo-500 selection:text-white">
        @if (Route::has('login'))
            {{-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Log
                        in</a>
                @endauth
            </div> --}}
        @endif
        
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">

                <a href="/" class="rounded shadow">
                    <img src="{{ asset('storage/img/bey-logo.png') }}" alt="App Logo" class="h-28 rounded shadow border-4 border-white">
                </a>

            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">



                    <a href="/login"
                        class="shadow scale-100 p-6 pr-0  border border-slate-500 rounded-lg flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">
                        <div>

                            <h2 class="text-xl font-semibold text-white">Crew</h2>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            class="self-center shrink-0 stroke-white w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>



                    <a href="/admin"
                        class="shadow scale-100 p-6 pr-0 border border-slate-500 rounded-lg flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">
                        <div>


                            <h2 class="text-xl font-semibold text-white">Administrators</h2>

                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            class="self-center shrink-0 stroke-white w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>

                </div>
            </div>

        </div>
    </div>



















</body>

</html>
