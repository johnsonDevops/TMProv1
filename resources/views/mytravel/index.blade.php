<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MyTravel') }}
        </h2>
    </x-slot>

    <livewire:flights />

</x-app-layout>
