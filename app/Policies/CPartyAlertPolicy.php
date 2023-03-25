<?php

namespace App\Policies;

use App\Models\CPartyAlert;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CPartyAlertPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('All CPartyAlerts') ||
        $user->hasPermissionTo('View CPartyAlerts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CPartyAlert $cPartyAlert): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('All CPartyAlerts') ||
        $user->hasPermissionTo('Create CPartyAlerts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CPartyAlert $cPartyAlert): bool
    {
        return $user->hasPermissionTo('All CPartyAlerts') ||
        $user->hasPermissionTo('Edit CPartyAlerts');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CPartyAlert $cPartyAlert): bool
    {
        return $user->hasPermissionTo('All CPartyAlerts') ||
        $user->hasPermissionTo('Delete CPartyAlerts');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CPartyAlert $cPartyAlert): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CPartyAlert $cPartyAlert): bool
    {
        return $user->hasRole('admin');
    }
}
