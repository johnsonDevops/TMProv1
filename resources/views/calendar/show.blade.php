<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Day Profile') }}
        </h2>
    </x-slot>
    <div class="relative">

    </div>

    <div class="bg-indigo-50 shadow">
        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-indigo-50 text-center overflow-hidden sm:rounded-lg p-6 relative">
            <h2 class="text-lg font-bold md:text-xl text-gray-800 leading-tight">
                {{ \Carbon\Carbon::parse($event->date)->format('l, F d') ?? '' }}</h2>
            <div class="absolute top-4 left-3">
                @if ($previousEvent)
                    <a href="{{ route('calendar.show', $previousEvent->id) ?? '' }}"
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-slate-200 to-slate-200 focus:ring-4 focus:outline-none focus:ring-purple-200">
                        <span class="relative px-3 py-1.5 transition-all ease-in duration-75 bg-white rounded-md">
                            <div class="flex flex-row align-middle">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>
                            </div>
                        </span>
                    </a>
                @endif
            </div>
            <div class="absolute top-4 right-3">
                @if ($nextEvent)
                    <a href="{{ route('calendar.show', $nextEvent->id) ?? '' }}"
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-slate-300 to-slate-300 focus:ring-4 focus:outline-none focus:ring-purple-200">
                        <span class="relative px-3 py-1.5 transition-all ease-in duration-75 bg-white rounded-md">
                            <div class="flex flex-row align-middle">
                                {{-- <span class="mr-2 text-pink-500">Next</span> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </div>
                        </span>
                    </a>
                @endif
            </div>
        </div>
    </div>











    <div class="pb-2">

        {{-- ======================== --}}



        <div class="pt-8 pb-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow sm:rounded-lg">


                    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Event Information</h3>
                            {{-- <p class="mt-1 max-w-2xl text-sm text-gray-500">Details about your event in  {{ $event->venue->city ?? '' }}, {{ $event->venue->state ?? '' }}.</p> --}}
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Event Name</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 capitalize">
                                        {{ $event->name ?? '' }}</dd>
                                </div>

                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Day Type</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 capitalize">
                                        {{ str_replace('_', ' ', $event->day_type) ?? '' }}</dd>
                                </div>

                                {{-- <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">City</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 capitalize">
                                        {{ $event->city ?? '' }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Country</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 capitalize">
                                        {{ $event->country ?? '' }}</dd>
                                </div> --}}



                                {{-- Venue ----------- --}}
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Venue</dt>

                                    @if ($event->venue->name ?? '')
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                            <span class="font-bold">{{ $event->venue->name ?? '' }}</span><br>
                                            {{ $event->venue->addr ?? '' }}<br>
                                            {{ $event->venue->city ?? '' }} {{ $event->venue->state ?? '' }}
                                            {{ $event->venue->zip ?? '' }} {{ $event->venue->country ?? '' }}<br><br>
                                            <span class="text-sm font-medium text-gray-500 capitalize">Capacity:
                                            </span>{{ $event->venue->capacity ?? '' }}<br>
                                            <span class="text-sm font-medium text-gray-500 capitalize">Type:
                                            </span>
                                            <span class="capitalize">{{ $event->venue->type ?? '' }}</span> <br>
                                            <br>
                                    @endif


                                    @if ($event->venue->url ?? '')
                                        <span class="text-sm font-medium text-gray-500 capitalize">Venue Official:
                                        </span>
                                        <a href="{{ $event->venue->url ?? '' }}"
                                            class="text-pink-500 font-semibold"
                                            target="_blank">{{ $event->venue->name ?? '' }} Official</a>
                                    @endif


                                    @if ($event->venue->wiki ?? '')
                                        <br><br>
                                        <span class="text-sm font-medium text-gray-500 capitalize">Venue Wiki:
                                        </span>
                                        <a href="{{ $event->venue->wiki ?? '' }}"
                                            class="text-pink-500 font-semibold"
                                            target="_blank">{{ $event->venue->name ?? '' }} Wiki</a>
                                    @endif


                                    @if ($event->venue->wiki ?? '')
                                        <br><br>
                                        <span class="text-sm font-medium text-gray-500 capitalize">Venue Loading
                                            Dock: </span>
                                        <a href="{{ $event->venue->dock_pin ?? '' }}"
                                            class="text-pink-500 font-semibold" target="_blank">Show me on a
                                            map</a>
                                    @endif


                                    @if ($event->venue->evac ?? '')
                                        <br><br>
                                        <span class="text-sm font-medium text-gray-500 capitalize">Tour EAP: </span>
                                        <a href="{{ asset($event->venue->evac) ?? '' }}"
                                            class="text-pink-500 font-semibold capitalize" target="_blank">
                                            View Tour Emergency Action Plan</a>
                                    @endif

                                    @if ($event->venue->notes ?? '')
                                        <dt class="text-sm font-medium text-gray-500">Notes</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                            {{ $event->venue->notes ?? '' }}
                                        </dd>
                                    @endif
                                    </dd>
                                </div>

                                {{-- ----------- --}}

                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Local Contacts</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">

                                        <ul>
                                            @foreach ($event->localcontacts as $localcontact)
                                            <li class="font-bold">{{ $localcontact->company ?? '' }}</li>
                                                <li>{{ $localcontact->name ?? '' }} | {{ $localcontact->title ?? '' }}</li>
                                                <li>Phone: <a href="tel:{{ $localcontact->phone ?? '' }}" class="text-pink-500" >{{ $localcontact->phone ?? '' }}</a></li>
                                                <li>Email: <a href="mailto:{{ $localcontact->email ?? '' }}" class="text-pink-500" >{{ $localcontact->email ?? '' }}</a></li>
                                                <br>
                                            @endforeach
                                        </ul>
                                    </dd>
                                </div>


                                {{-- ----------- --}}

                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm text-gray-500">Crew Hotels</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">

                                        <h2 class="text-normal font-bold underline">B Party Hotels:</h2>


                                            @foreach ($event->b_party_daysheets as $daysheet)
                                                <ul>
                                                    <li>{{ $daysheet->hotel1->name ?? '' }}</li>
                                                    <li>{{ $daysheet->hotel1->addr ?? '' }}</li>
                                                    <li>{{ $daysheet->hotel1->city ?? '' }}
                                                        {{ $daysheet->hotel1->state ?? '' }}
                                                        {{ $daysheet->hotel1->country ?? '' }}</li>
                                                    <li>{{ $daysheet->hotel1->phone ?? '' }}</li>
                                                    
                                                    <li>POC: {{ $daysheet->hotel1->poc_name ?? '' }}
                                                        <a href="tel:{{ $daysheet->hotel1->poc_phone ?? '' }}" class="text-pink-500" >{{ $daysheet->hotel1->poc_phone ?? '' }}</a>
                                                    </li>
                                                </ul>

                                                <br>

                                                <ul>
                                                    <li>{{ $daysheet->hotel2->name ?? '' }}</li>
                                                    <li>{{ $daysheet->hotel2->addr ?? '' }}</li>
                                                    <li>{{ $daysheet->hotel2->city ?? '' }}
                                                        {{ $daysheet->hotel2->state ?? '' }}
                                                        {{ $daysheet->hotel2->country ?? '' }}</li>
                                                    <li>{{ $daysheet->hotel2->phone ?? '' }}</li>
                                                    
                                                    <li>POC: {{ $daysheet->hotel2->poc_name ?? '' }}
                                                        <a href="tel:{{ $daysheet->hotel2->poc_phone ?? '' }}" class="text-pink-500" >{{ $daysheet->hotel2->poc_phone ?? '' }}</a>
                                                    </li>
                                                </ul>
                                            @endforeach

                                        <br>

                                        <h2 class="text-normal font-bold underline">C Party Hotels:</h2>

                                        @foreach ($event->c_party_daysheets as $daysheet)
                                        <ul>
                                            <li>{{ $daysheet->hotel1->name ?? '' }}</li>
                                            <li>{{ $daysheet->hotel1->addr ?? '' }}</li>
                                            <li>{{ $daysheet->hotel1->city ?? '' }}
                                                {{ $daysheet->hotel1->state ?? '' }}
                                                {{ $daysheet->hotel1->country ?? '' }}</li>
                                            <li>{{ $daysheet->hotel1->phone ?? '' }}</li>
                                            
                                            <li>POC: {{ $daysheet->hotel1->poc_name ?? '' }}
                                                <a href="tel:{{ $daysheet->hotel1->poc_phone ?? '' }}" class="text-pink-500" >{{ $daysheet->hotel1->poc_phone ?? '' }}</a>
                                            </li>
                                        </ul>

                                        <br>

                                        <ul>
                                            <li>{{ $daysheet->hotel2->name ?? '' }}</li>
                                            <li>{{ $daysheet->hotel2->addr ?? '' }}</li>
                                            <li>{{ $daysheet->hotel2->city ?? '' }}
                                                {{ $daysheet->hotel2->state ?? '' }}
                                                {{ $daysheet->hotel2->country ?? '' }}</li>
                                            <li>{{ $daysheet->hotel2->phone ?? '' }}</li>
                                            
                                            <li>POC: {{ $daysheet->hotel2->poc_name ?? '' }}
                                                <a href="tel:{{ $daysheet->hotel2->poc_phone ?? '' }}" class="text-pink-500" >{{ $daysheet->hotel2->poc_phone ?? '' }}</a>
                                            </li>
                                        </ul>
                                    @endforeach

                                <br>

                                    </dd>
                                </div>


                                            {{-- @foreach ($event->bPartyHotels as $hotel)
                                                <p>{{ $hotel->name }}</p>
                                            @endforeach
                                            @foreach ($event->cPartyHotels as $hotel)
                                                <p>{{ $hotel->name }}</p>
                                            @endforeach --}}


                                {{-- ----------- --}}

                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">&nbsp;</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">

                                        <span class="my-12"></span>
                                    </dd>
                                </div>

                                <br><br>


                            </dl>
                        </div>
                    </div>


                </div>
            </div>
        </div>




    </div>
</x-app-layout>
