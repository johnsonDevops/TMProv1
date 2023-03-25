<?php

namespace App\Policies;

use App\Models\APartyAlert;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class APartyAlertPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('All APartyAlerts') ||
        $user->hasPermissionTo('View APartyAlerts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, APartyAlert $aPartyAlert): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('All APartyAlerts') ||
        $user->hasPermissionTo('Create APartyAlerts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, APartyAlert $aPartyAlert): bool
    {
        return $user->hasPermissionTo('All APartyAlerts') ||
        $user->hasPermissionTo('Edit APartyAlerts');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, APartyAlert $aPartyAlert): bool
    {
        return $user->hasPermissionTo('All APartyAlerts') ||
        $user->hasPermissionTo('Delete APartyAlerts');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, APartyAlert $aPartyAlert): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, APartyAlert $aPartyAlert): bool
    {
        return $user->hasRole('admin');
    }
}
