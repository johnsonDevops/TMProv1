<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class BPartyAlert extends Component
{
    protected $listeners = ['refreshBPartylert' => '$refresh'];

    public function render()
    {
        $message = DB::table('b_party_alerts')->where('is_active', '=', 1)->get();

        return view('livewire.b-party-alert', compact('message'));
    }
}
