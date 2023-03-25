<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProductionAlert extends Component
{
    protected $listeners = ['refreshAPartylert' => '$refresh'];

    public function render()
    {
        $message = DB::table('production_alerts')->where('is_active', '=', 1)->get();

        return view('livewire.production-alert', compact('message'));
    }
}
