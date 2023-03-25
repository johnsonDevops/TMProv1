<?php

namespace App\Policies;

use App\Models\BPartyAlert;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BPartyAlertPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('All BPartyAlerts') ||
        $user->hasPermissionTo('View BPartyAlerts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BPartyAlert $bPartyAlert): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('All BPartyAlerts') ||
        $user->hasPermissionTo('Create BPartyAlerts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BPartyAlert $bPartyAlert): bool
    {
        return $user->hasPermissionTo('All BPartyAlerts') ||
        $user->hasPermissionTo('Edit BPartyAlerts');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BPartyAlert $bPartyAlert): bool
    {
        return $user->hasPermissionTo('All BPartyAlerts') ||
        $user->hasPermissionTo('Delete BPartyAlerts');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BPartyAlert $bPartyAlert): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BPartyAlert $bPartyAlert): bool
    {
        return $user->hasRole('admin');
    }
}
