<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Evacplan extends Component
{
    public $daysheet;
    public $event;
    public $venue;
    public $evac;
    public $showEvac;

    protected $listeners = ['refreshCPartyDaysheet' => '$refresh'];

    public function mount()
    {
        // Get the current CPartyDaysheet
        $this->daysheet = \App\Models\CPartyDaysheet::with(['event'])->where('is_active', true)->first();
    
        if ($this->daysheet) {
            $this->event = $this->daysheet->event;
            
            if ($this->event) {
                // Check if the current day is a load_in or show day
                if (in_array($this->event->day_type, ['load_in', 'show'])) {
                    if ($this->event->venue) {
                        // Get the evac plan for the venue if it exists
                        $this->evac = $this->event->venue->evac;
                    }
                }
            }
        }

        $this->showEvac = !empty($this->evac);
    }

    public function render()
    {
        return view('livewire.evacplan');
    }
}
