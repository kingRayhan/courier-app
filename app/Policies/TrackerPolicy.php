<?php

namespace App\Policies;

use App\Models\Tracker;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrackerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Tracker $tracker
     * @return mixed
     */
    public function delete(User $user, Tracker $tracker)
    {
        return $user->is_admin;
    }
}
