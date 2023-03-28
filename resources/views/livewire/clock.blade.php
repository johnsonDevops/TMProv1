<div>
    <div class="text-sm text-slate-600 absolute top-1 right-1" wire:ignore>
        {{ $time }}
    </div>
    
    @push('scripts')
    <script>
        document.addEventListener("livewire:load", function () {
            const initialData = @this.getInitialData();
            const clock = document.querySelector('#clock');
            clock.textContent = initialData.time;
            setInterval(() => {
                @this.call('updatedTime')
            }, 1000);
        });
    
        function updateTimezone() {
            const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            Livewire.emit('timezoneUpdated', timezone);
        }
        updateTimezone();
        setInterval(updateTimezone, 60000);
        Livewire.on('timeUpdated', time => {
            const clock = document.querySelector('#clock');
            const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            const timeWithZone = Luxon.DateTime.fromFormat(time, 'h:mm A / MMMM d, yyyy', { zone: timezone }).toFormat('h:mm A / MMMM d, yyyy');
            clock.textContent = timeWithZone;
        });
    </script>
    @endpush
    
</div>
