<?php

namespace App\Policies;

use App\Models\Study;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StudyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("read-study");
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Study $study): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo("create-study");
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Study $study): bool
    {
        return $user->hasPermissionTo("update-study");
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Study $study): bool
    {
        return $user->hasPermissionTo("delete-study");
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Study $study): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Study $study): bool
    {
        //
    }
}
