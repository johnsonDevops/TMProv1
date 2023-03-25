<?php

namespace App\Policies;

use App\Models\LocalContact;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LocalContactPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('All LocalContacts') ||
        $user->hasPermissionTo('View LocalContacts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, LocalContact $localContact): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('All LocalContacts') ||
        $user->hasPermissionTo('Create LocalContacts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, LocalContact $localContact): bool
    {
        return $user->hasPermissionTo('All LocalContacts') ||
        $user->hasPermissionTo('Edit LocalContacts');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, LocalContact $localContact): bool
    {
        return $user->hasPermissionTo('All LocalContacts') ||
        $user->hasPermissionTo('Delete LocalContacts');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, LocalContact $localContact): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, LocalContact $localContact): bool
    {
        return $user->hasRole('admin');
    }
}
