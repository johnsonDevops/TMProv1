<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active',
        'name',
        'type',
        'capacity',
        'addr',
        'city',
        'state',
        'zip',
        'country',
        'url',
        'wiki',
        'dock_pin',
        'evac',
        'notes',
    ];
    public function event()
    {
        return $this->belongsToMany(Event::class);
    }
}
