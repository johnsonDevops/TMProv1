<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // 
        'party_id',
        'department_id',
        // 
        'is_active',
        'f_name',
        'l_name',
        'alias',
        'phone',
        'title',
        'bus',
        'cred',
        'bag',
        'dob',
        'e_name',
        'e_relate',
        'e_phone',
        'e_email',
        'notes',
        // 'last_seen',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

        // Relationships -----------------------------------------

    public function party()
    {
        return $this->BelongsTo(Party::class);
    }

    public function department()
    {
        return $this->BelongsTo(Department::class);
    }
    
    // One user to many flights
    public function flights()
    {
        return $this->hasMany(Flight::class);
    }

    // Filament  -----------------------------------------

    public function canAccessFilament(): bool
    {
        return $this->hasRole(['admin', 'a_admin','b_admin','c_admin', 'travel']);
        // return str_ends_with($this->email, '@admin.com') && $this->hasVerifiedEmail();
    }
    // public function isAdmin(): bool
    // {
    //     return $this->hasRole(['admin']);
    // }
}
