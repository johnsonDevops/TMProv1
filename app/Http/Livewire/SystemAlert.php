<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SystemAlert extends Component
{
    protected $listeners = ['refreshSystemAlert' => '$refresh'];

    public function render()
    {
        $message = DB::table('system_alerts')->where('is_active', '=', 1)->get();

        return view('livewire.system-alert', compact('message'));
    }
}