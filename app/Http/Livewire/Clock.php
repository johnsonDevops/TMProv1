<?php

namespace App\Http\Livewire;

use DateTime;
use DateTimeZone;

use IntlTimeZone;
use Livewire\Component;
use Illuminate\Support\Facades\Date;

class Clock extends Component
{
    public $time;

    public function mount()
    {
        $timezone = $this->getTimezone();
        $this->time = Date::now($timezone)->format('h:i A / F j, Y');
    }

    public function render()
    {
        return view('livewire.clock');
    }

    public function hydrate()
    {
        $timezone = $this->getTimezone();
        $this->time = Date::now($timezone)->format('h:i A / F j, Y');
    }

    public function dehydrate()
    {
        $this->time = null;
    }

    public function updatedTime()
    {
        $timezone = $this->getTimezone();
        $this->emit('timeUpdated', Date::now($timezone)->format('h:i A / F j, Y'));
    }

    public function updated()
    {
        $timezone = $this->getTimezone();
        $this->emit('timeUpdated', Date::now($timezone)->format('h:i A / F j, Y'));
    }

    public function getInitialData()
    {
        $timezone = $this->getTimezone();
        return [
            'time' => Date::now($timezone)->format('h:i A / F j, Y')
        ];
    }

    private function getTimezone()
    {
        $offset = date('Z');
        $tz_seconds = $offset >= 0 ? $offset : 0;
        $timezone = timezone_name_from_abbr('', $tz_seconds, 0);
        if ($timezone) {
            return $timezone;
        } else {
            $timezone_list = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
            foreach ($timezone_list as $timezone_name) {
                $timezone = new DateTimeZone($timezone_name);
                $timezone_offset = $timezone->getOffset(new DateTime());
                if ($timezone_offset == $offset) {
                    return $timezone_name;
                }
            }
        }
        return 'UTC';
    }
    
    
    
    
    
}
