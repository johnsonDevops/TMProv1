<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_active',
        'flt_desc',
        'flt_file',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
