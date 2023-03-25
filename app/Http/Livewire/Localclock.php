<?php

use Livewire\Component;

class SlideShowComponent extends Component
{
    public $currentSlide = 0;
    public $slides = [
        ['title' => 'Slide 1', 'description' => 'Description for slide 1'],
        ['title' => 'Slide 2', 'description' => 'Description for slide 2'],
        ['title' => 'Slide 3', 'description' => 'Description for slide 3'],
    ];

    public function render()
    {
        return view('livewire.localclock', [
            'slide' => $this->slides[$this->currentSlide]
        ]);
    }

    public function nextSlide()
    {
        $this->currentSlide = ($this->currentSlide + 1) % count($this->slides);
    }
}


