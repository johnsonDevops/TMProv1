<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active',
        'date',
        'name',
        'city',
        'country',
        'venue_id',
        'day_type',
    ];

    public function localcontacts()
    {
        return $this->belongsToMany(LocalContact::class);
    }
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
    // DAYSHEETS -----------------------------------------
    public function a_party_daysheets()
    {
        return $this->hasMany(APartyDaysheet::class);
    }
    public function b_party_daysheets()
    {
        return $this->hasMany(BPartyDaysheet::class);
    }
    public function c_party_daysheets()
    {
        return $this->hasMany(CPartyDaysheet::class);
    }

// HOTELS ------------------------------------------------
public function aPartyHotels()
{
    return $this->belongsToMany(APartyHotel::class);
}

    public function bPartyHotels()
    {
        return $this->belongsToMany(BPartyHotel::class);
    }

    public function cPartyHotels()
    {
        return $this->belongsToMany(CPartyHotel::class);
    }

    public function hotels()
{
    return $this->belongsToMany(Hotel::class);
}

}
