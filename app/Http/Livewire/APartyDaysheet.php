<?php

namespace App\Http\Livewire;

use Livewire\Component;

class APartyDaysheet extends Component
{
    protected $listeners = ['refreshAPartyDaysheet' => '$refresh'];

    public function render()
    {
        $user = auth()->user();
    
        // Check if the user has the role or party ID to access the component
        if (! auth()->user()->hasRole('admin') && auth()->user()->party_id != 1) {
            return '';
        }
    
        $daysheet = \App\Models\APartyDaysheet::with(['hotel1', 'hotel2'])->where('is_active', true)->first();
    
        if ($daysheet) {
            $hotel1 = $daysheet->hotel1;
            $hotel2 = $daysheet->hotel2;
    
            return view('livewire.a-party-daysheet', compact('daysheet', 'hotel1', 'hotel2'));
        }
    
        return view('livewire.a-party-daysheet');
    }
    
    
}
