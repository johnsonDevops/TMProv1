<x-app-layout>
    <x-slot name="header" class="relative">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Production Area  =============================================== --}}
   
        <livewire:system-alert />

        
    {{-- A Party Area  =============================================== --}}


    @if (Auth::user()->hasRole('admin') || Auth::user()->party_id == 1)

        <livewire:a-party-alert />

        <div class="pt-5 pb-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow sm:rounded-lg p-6">

                    <livewire:a-party-daysheet />

                </div>
            </div>
        </div>
    @endif

    {{-- B Party Area =============================================== --}}


     @if (Auth::user()->hasRole('admin') || Auth::user()->party_id == 2)
        <livewire:b-party-alert />


        <div class="pt-5 pb-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow sm:rounded-lg p-6">

                    <livewire:b-party-daysheet />
                </div>
            </div>
        </div>
    @endif

    {{-- C Party Area =============================================== --}}

    @if (Auth::user()->hasRole('admin') || Auth::user()->party_id == 3)
        <livewire:c-party-alert />

        <div class="pt-5 pb-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow sm:rounded-lg p-6">

                    <livewire:c-party-daysheet />
                </div>
            </div>
        </div>
    @endif

    {{-- EVAC =============================================== --}}


        <div class="pt-5 pb-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow sm:rounded-lg p-6">

                    <livewire:evacplan />

                </div>
            </div>
        </div>



</x-app-layout>
