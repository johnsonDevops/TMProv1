<?php

namespace App\Policies;

use App\Models\Flight;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FlightPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('All Flights') ||
        $user->hasPermissionTo('View Flights');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Flight $flight): bool
    {
        return $user->hasRole('admin');  
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('All Flights') ||
        $user->hasPermissionTo('Create Flights');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Flight $flight): bool
    {
        return $user->hasPermissionTo('All Flights') ||
        $user->hasPermissionTo('Edit Flights');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Flight $flight): bool
    {
        return $user->hasPermissionTo('All Flights') ||
        $user->hasPermissionTo('Delete Flights');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Flight $flight): bool
    {
        return $user->hasRole('admin');  
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Flight $flight): bool
    {
        return $user->hasRole('admin');  
    }
}
