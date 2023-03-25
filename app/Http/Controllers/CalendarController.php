<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return view('calendar.index');
    }

    public function show($id)
    {
        $event = $this->getEvent($id);
        $nextEvent = $this->getNextEvent($event);
        $previousEvent = $this->getPreviousEvent($event);
        $hotels = $event->aPartyHotels;
    
        return view('calendar.show', compact('event', 'nextEvent', 'previousEvent', 'hotels'));
    }

    protected function getEvent($id)
    {
        return Event::with('localcontacts', 'a_party_daysheets.hotel1', 'a_party_daysheets.hotel2', 'b_party_daysheets.hotel1', 'b_party_daysheets.hotel2', 'c_party_daysheets.hotel1', 'c_party_daysheets.hotel2', 'aPartyHotels')
            ->select('id', 'is_active', 'date', 'name', 'city', 'country', 'venue_id', 'day_type')
            ->findOrFail($id);
    }

    protected function getNextEvent($event)
    {
        return Event::where('date', '>', $event->date)
            ->where('is_active', 1)
            ->orderBy('date', 'asc')
            ->first();
    }

    protected function getPreviousEvent($event)
    {
        return Event::where('date', '<', $event->date)
            ->where('is_active', 1)
            ->orderBy('date', 'desc')
            ->first();
    }
}
