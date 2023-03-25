<?php

namespace App\Policies;

use App\Models\BPartyHotel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BPartyHotelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('All BPartyHotels') ||
        $user->hasPermissionTo('View BPartyHotels');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BPartyHotel $bPartyHotel): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('All BPartyHotels') ||
        $user->hasPermissionTo('Create BPartyHotels');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BPartyHotel $bPartyHotel): bool
    {
        return $user->hasPermissionTo('All BPartyHotels') ||
        $user->hasPermissionTo('Edit BPartyHotels');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BPartyHotel $bPartyHotel): bool
    {
        return $user->hasPermissionTo('All BPartyHotels') ||
        $user->hasPermissionTo('Delete BPartyHotels');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BPartyHotel $bPartyHotel): bool
    {
       return $user->hasRole('admin');    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BPartyHotel $bPartyHotel): bool
    {
        return $user->hasRole('admin');
    }
}
