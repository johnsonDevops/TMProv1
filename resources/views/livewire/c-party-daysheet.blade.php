<div>
    <div wire:poll.visible>
        {{-- --------------- --}}
        <div class="border-l-4 border-indigo-500 pl-3">
            <h2 class="text-xl font-bold text-slate-900">C Party Day Sheet</h2>

            @isset($daysheet)
                <span class="">
                    <span class="text-sm capitalize font-semibold text-slate-500">
                        {{ $daysheet && $daysheet->event ? Carbon\Carbon::parse($daysheet->event->date)->format('l F d, Y') : '' }}<br>
                        {{ $daysheet && $daysheet->event && $daysheet->event->venue ? $daysheet->event->venue->name : '' }}
                        &nbsp;|&nbsp;
                        {{ $daysheet && $daysheet->event ? str_replace('_', ' ', $daysheet->event->day_type) : '' }} Day
                    </span>

                    @isset($daysheet->event->venue->dock_pin)
                        <br>
                        <a href="{{ $daysheet->event->venue->dock_pin ?? '' }}" type="button"
                            class="font-semibold capitalize mt-2 text-pink-600 border border-pink-200 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-sm px-1.5 py-1.5 text-center"
                            target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>

                            <span class="inline-block">{{ $daysheet->event->venue->name ?? '' }}</span> </a>
                    @endisset
                @else
                    No active daysheet.
                @endisset
        </div>


    
    @if (!empty($daysheet->schedule))
    <div class="relative overflow-x-auto mt-7">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs font-medium text-gray-700 uppercase bg-slate-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Event
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Start
                    </th>
                    <th scope="col" class="px-6 py-3">
                        End
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b">

                    @if (!empty($daysheet->schedule))
                    @foreach ($daysheet->schedule as $schedule)
                        <tr class="border-b">
                            <td class="px-6 py-4 font-medium">{{ $schedule['event_name'] ?? '' }}</td>
                            <td class="px-6 py-4">{{ $schedule['event_start_time'] ?? '' }}</td>
                            <td class="px-6 py-4">{{ $schedule['event_end_time'] ?? '' }}</td>
                        </tr>
                    @endforeach
                @endif

                </tr>
            </tbody>
        </table>
    </div>
    @endif


    
        @if (isset($daysheet->notes))
            <div class="mt-7 pb-4">
                <h3 class="text-lg font-semibold underline">Admin Notes</h3>
                {!! $daysheet->notes ?? '' !!}
            </div>
        @endif



        <div class="flex gap-4 mt-7 text-sm md:text-base leading-6 bg-stripes-indigo rounded-lg">
            @if (isset($daysheet->event->venue))
                <div class="p-4 w-full rounded-lg text-center bg-slate-100">
                    <div>
                        <span class="text-lg underline font-bold">Venue</span><br>
                        {{ $daysheet->event->venue->name ?? '-----' }}</br>
                        {{ $daysheet->event->venue->addr ?? '-----' }}<br>
                        {{ $daysheet->event->venue->city ?? '-----' }},
                        {{ $daysheet->event->venue->state ?? '-----' }}
                        {{ $daysheet->event->venue->zip ?? '-----' }}<br>
                    </div>
                </div>
            @endif
            @if (isset($hotel1))
                <div class="p-4 w-full rounded-lg text-center bg-slate-100">
                    <div>
                        <span class="text-lg underline font-bold">HOTEL</span><br>
                        {{ $hotel1->name ?? '-----' }}</br>
                        {{ $hotel1->addr ?? '-----' }}<br>
                        {{ $hotel1->city ?? '-----' }},
                        {{ $hotel1->state ?? '-----' }}
                        {{ $hotel1->zip ?? '-----' }}
                    </div>
                </div>
            @endif
            @if (isset($hotel2))
                <div class="p-4 w-full rounded-lg text-center bg-slate-100">
                    <div>
                        <span class="text-lg underline font-bold">HOTEL 2</span><br>
                        {{ $hotel2->name ?? '-----' }}</br>
                        {{ $hotel2->addr ?? '-----' }}<br>
                        {{ $hotel2->city ?? '-----' }},
                        {{ $hotel2->state ?? '-----' }}
                        {{ $hotel2->zip ?? '-----' }}
                    </div>
                </div>
            @endif
        </div>

        {{-- --------------- --}}
    </div>
</div>
