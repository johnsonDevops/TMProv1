<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Contacts extends Component
{
    public $users;

    protected $listeners = ['refreshDirectory' => '$refresh'];
    public function render()
    {
        $this->users = User::with('department')->where('is_active', '=', 1)->orderBy('name', 'asc')->get();
        return view('livewire.contacts');
    }
}
