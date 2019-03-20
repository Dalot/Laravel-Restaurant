<?php

namespace App\Repositories;

use App\User;

/**
 * Interface UserRepository
 * @package namespace App\Repositories;
 */

class UserRepository
{
    public function createUser($user)
    {
        return User::create([
                'name' => $user["name"],
                'email' => $user["email"],
                'password' => bcrypt($user["password"])
            ]);
    }
}