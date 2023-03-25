<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class APartyAlert extends Component
{
    protected $listeners = ['refreshAPartylert' => '$refresh'];

    public function render()
    {
        $message = DB::table('a_party_alerts')->where('is_active', '=', 1)->get();

        return view('livewire.a-party-alert', compact('message'));
    }
}
