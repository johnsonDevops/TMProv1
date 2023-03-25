<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Flights extends Component
{
    protected $listeners = ['refreshFlights' => '$refresh'];

    public function render()
    {
        $users = User::with('flights')->find(Auth::id());
        return view('livewire.flights', compact('users'));
    }
}