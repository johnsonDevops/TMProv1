<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\APartyHotel;

class APartyDaysheet extends Model
{
    use HasFactory;

    protected $casts = [
        'schedule' => 'array',
    ];
    
    protected $fillable = [
        'hotel_id_1',
        'hotel_id_2',
        'is_active',
        'day_type',
        'event_id',
        'notes',
        'schedule',
    ];


    // public function events()
    // {
    //     return $this->belongsToMany(Event::class);
    // }
    
    public function hotel1()
    {
        return $this->belongsTo(APartyHotel::class, 'hotel_id_1');
    }
    public function hotel2()
    {
        return $this->belongsTo(APartyHotel::class, 'hotel_id_2');
    }
    public function event()
    {
        return $this->BelongsTo(Event::class);
    }
}
