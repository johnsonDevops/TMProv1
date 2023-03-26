<div>
    <div wire:poll.visible>
    {{-- -------------------------- --}}
    <div class="pt-6 pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg p-6 relative">

                <div class="border-l-4 border-indigo-500 pl-3 mb-5">
                    <h2 class="text-xl font-bold text-slate-900">Flight Itineraries</h2>
                    <span class="text-sm capitalize font-semibold text-slate-500">
                        All your current flight Itineraries.
                    </span>
                </div>

                {{-- REFRESH BUTTON ----------------------- --}}
                {{-- <div class="refresh absolute top-7 right-5">
                    <button wire:click="$emit('refreshFlights')" class="refresh-icon">
                        <div wire:loading.remove>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </div>
                        <div wire:loading>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 animate-spin" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </div>
                    </button>
                </div> --}}
                {{-- /REFRESH BUTTON ----------------------- --}}
                @if (count($users->flights->where('is_active', 1)))

                <div class="flex flex-col overflow-x-auto mt-7">
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2">
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-center text-sm font-light">
                                    <thead class="border-b font-medium bg-slate-100">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Itinerary Name</th>
                                            <th scope="col" class="px-6 py-4">Last Updated</th>
                                            <th scope="col" class="px-6 py-4">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($users->flights))
                                        @foreach ($users->flights->where('is_active', 1) as $flight)
                                                <tr class="border-b">
                                                    <td class="px-6 py-4 font-medium">{{ $flight->flt_desc ?? 'Flight Name' }}</td>
                                                    <td class="px-6 py-4">{{ $flight->updated_at ?? 'Flight Name' }}</td>
                                                    <td class="px-6 py-4">
                                                        <a href="{{ asset( 'storage/' . $flight->flt_file ) ?? ''}}" type="button"
                                                            class="md:min-w-max mb-2 md:mb-0 px-6 py-2 md:mr-2 text-xs font-medium text-center text-white bg-indigo-500 rounded-lg hover:bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-indigo-300"
                                                            target="_blank">
                                                            View
                                                        </a>
                                                        <a href="{{ asset( 'storage/' . $flight->flt_file ) ?? ''}}" type="button"
                                                            class="md:min-w-max mb-2 md:mb-0  px-3 py-2 text-xs font-medium text-center text-white bg-indigo-500 rounded-lg hover:bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-indigo-300"
                                                            download="">
                                                            Downlaod
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    No active itineraries found.
                    <br>
                @endif
            </div>
        </div>
    </div>
    {{-- -------------------------- --}}
</div>
</div>
