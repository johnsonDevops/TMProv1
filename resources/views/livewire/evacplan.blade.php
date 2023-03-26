<div>
    <div wire:poll.visible>
        {{-- =================== --}}
        <div>
            <div class="border-l-4 border-indigo-500 pl-3">
                <h2 class="text-xl font-bold text-slate-900">Emergency Action Plan</h2>
                <span class="text-sm capitalize font-semibold text-slate-500">
                    {{ $daysheet && $event && $event->venue ? $event->venue->name : '' }}
                </span>
            </div>
            @if ($evac)
                <img src="{{ asset( 'storage/' . $evac ) ?? '' }}" class="mt-6" alt="Evacuation Plan">
            @else
                <p>Emergency response plan will be available by upcoming show day.</p>
            @endif
        </div>
    </div>

    {{-- =================== --}}
</div>

