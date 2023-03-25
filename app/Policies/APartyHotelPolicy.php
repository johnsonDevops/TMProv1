<?php

namespace App\Policies;

use App\Models\APartyHotel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class APartyHotelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('All APartyHotels') ||
        $user->hasPermissionTo('View APartyHotels');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, APartyHotel $aPartyHotel): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('All APartyHotels') ||
        $user->hasPermissionTo('Create APartyHotels');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, APartyHotel $aPartyHotel): bool
    {
        return $user->hasPermissionTo('All APartyHotels') ||
        $user->hasPermissionTo('Edit APartyHotels');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, APartyHotel $aPartyHotel): bool
    {
        return $user->hasPermissionTo('All APartyHotels') ||
        $user->hasPermissionTo('Delete APartyHotels');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, APartyHotel $aPartyHotel): bool
    {
        return $user->hasRole('admin');  
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, APartyHotel $aPartyHotel): bool
    {
        return $user->hasRole('admin');  
    }
}
