<?php

namespace App\Policies;

use App\Models\CPartyDaysheet;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CPartyDaysheetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('All CPartyDaysheets') ||
        $user->hasPermissionTo('View CPartyDaysheets');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CPartyDaysheet $cPartyDaysheet): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('All CPartyDaysheets') ||
        $user->hasPermissionTo('Create CPartyDaysheets');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CPartyDaysheet $cPartyDaysheet): bool
    {
        return $user->hasPermissionTo('All CPartyDaysheets') ||
        $user->hasPermissionTo('Edit CPartyDaysheets');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CPartyDaysheet $cPartyDaysheet): bool
    {
        return $user->hasPermissionTo('All CPartyDaysheets') ||
        $user->hasPermissionTo('Delete CPartyDaysheets');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CPartyDaysheet $cPartyDaysheet): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CPartyDaysheet $cPartyDaysheet): bool
    {
        return $user->hasRole('admin');
    }
}
