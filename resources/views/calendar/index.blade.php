<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calendar') }}
        </h2>
    </x-slot>

    <div class="pt-5 pb-2">


        <livewire:calendar />

    </div>
</x-app-layout>
