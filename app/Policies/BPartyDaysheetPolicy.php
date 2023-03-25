<?php

namespace App\Policies;

use App\Models\BPartyDaysheet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BPartyDaysheetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('All BPartyDaysheets') ||
        $user->hasPermissionTo('View APartyDaysheets');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BPartyDaysheet $bPartyDaysheet): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('All BPartyDaysheets') ||
        $user->hasPermissionTo('Create APartyDaysheets');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BPartyDaysheet $bPartyDaysheet): bool
    {
        return $user->hasPermissionTo('All BPartyDaysheets') ||
        $user->hasPermissionTo('Edit APartyDaysheets');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BPartyDaysheet $bPartyDaysheet): bool
    {
        return $user->hasPermissionTo('All BPartyDaysheets') ||
        $user->hasPermissionTo('Delete APartyDaysheets');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BPartyDaysheet $bPartyDaysheet): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BPartyDaysheet $bPartyDaysheet): bool
    {
        return $user->hasRole('admin');
    }
}
