<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    protected $table = 'parties';
    protected $fillable = [
        'party_name',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    // public function broadcasts()
    // {
    //     return $this->belongsToMany(broadcast::class);
    // }
}
