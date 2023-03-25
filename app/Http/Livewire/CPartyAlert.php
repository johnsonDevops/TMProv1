<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CPartyAlert extends Component
{
    protected $listeners = ['refreshCPartylert' => '$refresh'];

    public function render()
    {
        $message = DB::table('c_party_alerts')->where('is_active', '=', 1)->get();

        return view('livewire.c-party-alert', compact('message'));
    }
}
