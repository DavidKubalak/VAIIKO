<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Určuje, či môže používateľ upravovať profil.
     */
    public function update(User $currentUser, User $user): bool
    {
        return $currentUser->is_admin || $currentUser->id === $user->id;
    }

    public function admin(User $user): bool
    {
        return $user->is_admin;
    }

}
