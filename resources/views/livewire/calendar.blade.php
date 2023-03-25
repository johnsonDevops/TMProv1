<div>
    <div wire:poll.visible>
        {{-- -------------------------- --}}
        <style>
            .border-normal {
                border-left: 5px solid #94a3b8;
            }

            .border-show {
                border-left: 5px solid #db2777;
                background-color: #fdf2f8;
            }

            .bg-stripes-indigo {
                background-color: #818cf81a;
                background-image: linear-gradient(135deg, #6366f180 10%, transparent 0, transparent 50%, #6366f180 0, #6366f180 60%, transparent 0, transparent);
                background-size: 7.07px 7.07px;
            }
        </style>
        {{-- -------------------------- --}}
        <div class="pb-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden relative">
                    {{--  --}}

                    <div x-data="{ tab: 1 }" class="antialiased">
                        <div class="relative flex flex-col overflow-hidden">

                            <div class="flex space-x-14 bg-white border-b border-gray-200 px-4 mb-2 ">
                                <button type="button"
                                    class="focus:outline-none text-gray-400 hover:text-gray-500 py-4 px-1 border-t-2 text-base tracking-wide font-medium border-transparent"
                                    x-on:click="tab = 1" :class="{ 'text-gray-700 border-indigo-500': tab === 1 }">
                                    Upcoming
                                    Events
                                </button>
                                <button type="button"
                                    class="focus:outline-none text-gray-400 hover:text-gray-500 py-2 px-1 border-t-2 text-base tracking-wide font-medium border-transparent"
                                    x-on:click="tab = 2" :class="{ 'text-gray-700 border-indigo-500': tab === 2 }">
                                    Past
                                    Events
                                </button>
                            </div>
                            <div>

                                <div x-show="tab === 1">
                                    {{-- ================================================================== --}}
                                    <div class="grid grid-cols-1 gap-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                                        @foreach ($events as $event)
                                            @if ($event->date >= $now->toDateString())
                                                @php
                                                    $date = \Carbon\Carbon::parse($event->date);
                                                    $month = $date->format('F Y');
                                                @endphp

                                                @if ($month != $current_month)
                                                    @php
                                                        $current_month = $month;
                                                    @endphp

                                                    <h1
                                                        class="month-header col-span-full bg-gray-200 p-5 my-0 md:my-7 w-full text-xl sm:text-2xl font-extrabold text-slate-700 tracking-tight dark:text-slate-200">
                                                        {{ $current_month }}
                                                    </h1>
                                                @endif

                                                <a href="{{ route('calendar.show', $event->id) }}">

                                                    <div class="grid-item">
                                                        <div
                                                            class="col-span-1 flex border-t border-r border-b shadow border-gray-200 dark:border-gray-600">

                                                            <div class="
                                                            {{ $event->day_type === 'show' ? 'border-show' : 'border-normal' }}
                                                            w-16 
                                                            flex flex-col 
                                                            flex-start 
                                                            flex-shrink-0
                                                            shadow 
                                                            bg-gray-100 
                                                            text-center 
                                                            justify 
                                                            text-gray-500 
                                                            py-3 
                                                            dark:bg-gray-700 
                                                            dark:text-white;">
                                                                      <span  class="text-sm font-semibold text-gray-400 uppercase">{{ \Carbon\Carbon::parse($event->date)->format('D') ?? '' }}</span>
                                                                      <span class="text-3xl text-slate-500 font-bold">{{ \Carbon\Carbon::parse($event->date)->format('d') ?? '' }}</span>
                                                                      <span  class="text-sm font-semibold text-gray-400 uppercase">{{ \Carbon\Carbon::parse($event->date)->format('M') ?? '' }}</span>
                                                                  </div>
      

                                                            <div
                                                                class="shadow flex flex-1 items-center justify-between truncate bg-white dark:bg-gray-800">
                                                                <div class="flex-1 truncate px-4 py-2 text-sm">
                                                                    <p
                                                                        class="text-xl uppercase font-semibold text-gray-700 dark:text-gray-200">
                                                                        {{ $event->day_type ?? '' }}</p>
                                                                    <p class="text-sm text-gray-500 dark:text-gray-200">
                                                                        {{ $event->venue->name ?? '-----' }}</p>
                                                                    <p class="text-xs text-gray-500 dark:text-gray-200">
                                                                        {{ $event->city }},
                                                                        {{ $event->country }}</p>
                                                                </div>
                                                                <div class="flex-shrink-0 pr-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        class="w-6 h-6 text-gray-500">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                    {{-- /end tab 1 --}}
                                </div>
                                {{-- ================================================================== --}}
                                <div x-cloak x-show="tab === 2">










                                    <div class="grid grid-cols-1 gap-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

        @foreach ($pastEvents as $event)
            @php
                $date = \Carbon\Carbon::parse($event->date);
                $month = $date->format('F Y');
            @endphp
            @if ($month != $current_month)
                @php
                    $current_month = $month;
                @endphp

                                                    <h1
                                                        class="month-header col-span-full bg-gray-200 p-5 my-0 md:my-7 w-full text-xl sm:text-2xl font-extrabold text-slate-700 tracking-tight dark:text-slate-200">
                                                        {{ $current_month }}
                                                    </h1>
                                                @endif

                                                <a href="{{ route('calendar.show', $event->id) }}">

                                                    <div class="grid-item">
                                                        <div
                                                            class="col-span-1 flex border-t border-r border-b shadow border-gray-200 dark:border-gray-600">

                                                            <div class="
                                                            {{ $event->day_type === 'show' ? 'border-show' : 'border-normal' }}
                                                            w-16 
                                                            flex flex-col 
                                                            flex-start 
                                                            flex-shrink-0
                                                            shadow 
                                                            bg-gray-100 
                                                            text-center 
                                                            justify 
                                                            text-gray-500 
                                                            py-3 
                                                            dark:bg-gray-700 
                                                            dark:text-white;">
                                                                      <span  class="text-sm font-semibold text-gray-400 uppercase">{{ \Carbon\Carbon::parse($event->date)->format('D') ?? '' }}</span>
                                                                      <span class="text-3xl text-slate-500 font-bold">{{ \Carbon\Carbon::parse($event->date)->format('d') ?? '' }}</span>
                                                                      <span  class="text-sm font-semibold text-gray-400 uppercase">{{ \Carbon\Carbon::parse($event->date)->format('M') ?? '' }}</span>
                                                                  </div>
      

                                                            <div
                                                                class="shadow flex flex-1 items-center justify-between truncate bg-stripes-indigo dark:bg-gray-800">
                                                                <div class="flex-1 truncate px-4 py-2 text-sm">
                                                                    <p
                                                                        class="text-xl uppercase font-semibold text-gray-700 dark:text-gray-200">
                                                                        {{ $event->day_type ?? '' }}</p>
                                                                    <p class="text-sm text-gray-500 dark:text-gray-200">
                                                                        {{ $event->venue->name ?? '-----' }}</p>
                                                                    <p class="text-xs text-gray-500 dark:text-gray-200">
                                                                        {{ $event->city }},
                                                                        {{ $event->country }}</p>
                                                                </div>
                                                                <div class="flex-shrink-0 pr-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        class="w-6 h-6 text-gray-500">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            {{-- @endif --}}
                                        @endforeach
                                    </div>
                                    {{-- /end tab 1 --}}
                                </div>

































                                    {{-- loop --}}
                                    {{-- <ul role="list" class="grid grid-cols-1 gap-0 lg:grid-cols-4 sm:gap-2">

                                        @foreach ($pastEvents as $pastEvent)
                                            <li
                                                class="col-span-1 flex border-t border-r border-b shadow border-gray-200 dark:border-gray-600">

                                                <div
                                                    class="
                                                    w-16 
                                                    flex flex-col 
                                                    flex-start 
                                                    flex-shrink-0
                                                    shadow 
                                                    bg-slate-200 
                                                    text-center 
                                                    justify 
                                                    border-slate-400
                                                    border-l-4
                                                    text-gray-500 
                                                    py-3 
                                                    dark:bg-gray-700 
                                                    dark:text-white;">
                                                    <span
                                                        class="text-sm font-semibold text-gray-400 uppercase">{{ \Carbon\Carbon::parse($pastEvent->date)->format('D') ?? '' }}</span>
                                                    <span
                                                        class="text-3xl text-slate-400 font-bold">{{ \Carbon\Carbon::parse($pastEvent->date)->format('d') ?? '' }}</span>
                                                    <span
                                                        class="text-sm font-semibold text-gray-400 uppercase">{{ \Carbon\Carbon::parse($pastEvent->date)->format('M') ?? '' }}</span>
                                                </div>

                                                <div
                                                    class="shadow flex flex-1 items-center justify-between truncate bg-stripes-indigo dark:bg-gray-800">
                                                    <div class="flex-1 truncate px-4 py-2 text-sm">
                                                        <p
                                                            class="text-xl font-semibold text-gray-500 dark:text-gray-200">
                                                            {{ $pastEvent->category ?? '' }}</p>
                                                        <p class="text-sm text-gray-500 dark:text-gray-200">
                                                            {{ $pastEvent->venue->name ?? '-----' }}</p>
                                                        <p class="text-xs text-gray-500 dark:text-gray-200">
                                                            {{ $pastEvent->city }},
                                                            {{ $pastEvent->country }}</p>
                                                    </div>
                                                    <div class="flex-shrink-0 pr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6 text-gray-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul> --}}














                                    {{-- /end tab 2 --}}
                                </div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        document.querySelectorAll("pre").forEach((block) => {
                                            hljs.highlightBlock(block);
                                            block.classList.add('p-6');
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                    {{-- END TABS --}}

                </div>
            </div>
        </div>

        {{-- -------------------------- --}}
    </div>
</div>
