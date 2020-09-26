<?php

namespace App\Policies;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Shop $shop
     * @return mixed
     */
    public function view(User $user, Shop $shop)
    {
        return !$user->is_admin;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return !$user->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Shop $shop
     * @return mixed
     */
    public function update(User $user, Shop $shop)
    {
        return $shop->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Shop $shop
     * @return mixed
     */
    public function delete(User $user, Shop $shop)
    {
        return $shop->user_id == $user->id;
    }
}
