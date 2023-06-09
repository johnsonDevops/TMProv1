<div>
    <div wire:poll.visible>
        {{-- ------------------------- --}}
        @if (count($message) >= 1)
            <div class="pt-5">
                @foreach ($message as $message)
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-pink-100 overflow-hidden shadow sm:rounded-lg px-6 py-3">

                            <div class="border-l-4 border-indigo-500 pl-3 mb-2">
                                <h2 class="text-lg font-bold text-slate-900 dark:text-gray-200">
                                    {{ $message->title ?? '...' }}</h2>
                                    {{-- <span class="text-sm text-slate-500 capitalize">{{ \Carbon\Carbon::parse($message->updated_at)->format('F j, Y') }}</span> --}}
                                <span class="text-sm capitalize font-normal text-slate-500 dark:text-gray-400">
                                </span>
                            </div>
                            <div class="pl-4">
                                <p class="">{!! $message->body ?? '...' !!}<br>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        {{-- ------------------------- --}}
    </div>
</div>
