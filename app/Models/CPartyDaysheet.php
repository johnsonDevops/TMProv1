<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPartyDaysheet extends Model
{
    use HasFactory;

    protected $casts = [
        'schedule' => 'array',
    ];
    
    protected $fillable = [
        'hotel_id_1',
        'hotel_id_2',
        'event_id',
        'is_active',
        'notes',
        'schedule',
    ];

    public function hotel1()
    {
        return $this->belongsTo(CPartyHotel::class, 'hotel_id_1');
    }
    public function hotel2()
    {
        return $this->belongsTo(CPartyHotel::class, 'hotel_id_2');
    }
    public function event()
    {
        return $this->BelongsTo(Event::class);
    }
}
