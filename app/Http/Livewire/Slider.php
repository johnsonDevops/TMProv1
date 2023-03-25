<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class Slider extends Component
{
    public $event;

    public function mount()
    {
        $this->event = Event::where('is_active', 1)->first();
    }

    public function next()
    {
        $nextEvent = Event::where('id', '>', $this->event->id)->where('is_active', 1)->first();

        if ($nextEvent) {
            $this->event = $nextEvent;
        }
    }

    public function previous()
    {
        $previousEvent = Event::where('id', '<', $this->event->id)->where('is_active', 1)->orderByDesc('id')->first();

        if ($previousEvent) {
            $this->event = $previousEvent;
        }
    }

    public function render()
    {
        return view('livewire.slider', [
            'event' => $this->event,
        ]);
    }
}

