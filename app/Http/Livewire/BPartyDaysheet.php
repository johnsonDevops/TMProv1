<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BPartyDaysheet extends Component
{
    protected $listeners = ['refreshBPartyDaysheet' => '$refresh'];

    public function render()
    {
        $daysheet = \App\Models\BPartyDaysheet::with(['hotel1', 'hotel2'])->where('is_active', true)->first();
    
        if ($daysheet) {
            $hotel1 = $daysheet->hotel1;
            $hotel2 = $daysheet->hotel2;
    
            return view('livewire.b-party-daysheet', compact('daysheet', 'hotel1', 'hotel2'));
        }
    
        return view('livewire.b-party-daysheet');
    }
}
