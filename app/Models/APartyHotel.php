<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APartyHotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_active',
        'name',
        'addr',
        'city',
        'state',
        'zip',
        'country',
        'phone',
        'poc_name',
        'poc_phone',
        'url',
        'notes',
    ];

    // you can scrap this
    public function daysheets()
    {
        return $this->hasMany(APartyDaysheet::class);
    }
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
