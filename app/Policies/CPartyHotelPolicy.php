<?php

namespace App\Policies;

use App\Models\CPartyHotel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CPartyHotelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('All CPartyHotels') ||
        $user->hasPermissionTo('View CPartyHotels');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CPartyHotel $cPartyHotel): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('All CPartyHotels') ||
        $user->hasPermissionTo('Create CPartyHotels');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CPartyHotel $cPartyHotel): bool
    {
        return $user->hasPermissionTo('All CPartyHotels') ||
        $user->hasPermissionTo('Edit CPartyHotels');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CPartyHotel $cPartyHotel): bool
    {
        return $user->hasPermissionTo('All CPartyHotels') ||
        $user->hasPermissionTo('Delete CPartyHotels');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CPartyHotel $cPartyHotel): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CPartyHotel $cPartyHotel): bool
    {
        return $user->hasRole('admin');
    }
}
