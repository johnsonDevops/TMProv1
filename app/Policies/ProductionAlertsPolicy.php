<?php

namespace App\Policies;

use App\Models\ProductionAlerts;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductionAlertsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('All ProductionAlerts') ||
        $user->hasPermissionTo('View ProductionAlerts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ProductionAlerts $productionAlerts): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('All ProductionAlerts') ||
        $user->hasPermissionTo('Create ProductionAlerts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ProductionAlerts $productionAlerts): bool
    {
        return $user->hasPermissionTo('All ProductionAlerts') ||
        $user->hasPermissionTo('Edit ProductionAlerts');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ProductionAlerts $productionAlerts): bool
    {
        return $user->hasPermissionTo('All ProductionAlerts') ||
        $user->hasPermissionTo('Delete ProductionAlerts');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ProductionAlerts $productionAlerts): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ProductionAlerts $productionAlerts): bool
    {
        return $user->hasRole('admin');
    }
}
