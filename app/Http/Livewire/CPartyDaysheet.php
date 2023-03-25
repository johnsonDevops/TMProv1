<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CPartyDaysheet extends Component
{
    protected $listeners = ['refreshCPartyDaysheet' => '$refresh'];

    public function render()
    {
        $daysheet = \App\Models\CPartyDaysheet::with(['hotel1', 'hotel2'])->where('is_active', true)->first();
    
        if ($daysheet) {
            $hotel1 = $daysheet->hotel1;
            $hotel2 = $daysheet->hotel2;
    
            return view('livewire.c-party-daysheet', compact('daysheet', 'hotel1', 'hotel2'));
        }
    
        return view('livewire.c-party-daysheet');
    }
}
