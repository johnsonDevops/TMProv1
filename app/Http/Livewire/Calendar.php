<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;

class Calendar extends Component
{
    public $now;
    public $events;
    public $pastEvents;
    public $current_month;

    public function mount()
    {
        $this->now = Carbon::now();
        $this->events = Event::with('venue')
            ->where('date', '>=', $this->now->toDateString())
            ->where('is_active', true)
            ->get();
        $this->pastEvents = Event::with('venue')
            ->where('date', '<', $this->now->toDateString())
            ->where('is_active', true)
            ->get()
            ->reverse();
        $this->current_month = '';
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}

