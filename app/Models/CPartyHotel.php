<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPartyHotel extends Model
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
    // scrap this
    public function daysheets()
    {
        return $this->hasMany(CPartyDaysheet::class);
    }
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
