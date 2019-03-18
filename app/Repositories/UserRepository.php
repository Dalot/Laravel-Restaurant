<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;

/**
 * Interface UserRepository
 * @package namespace App\Repositories;
 */

class UserRepository
{
    public function createUser($user)
    {
        return User::create([
                'name' => $validated["name"],
                'email' => $validated["email"],
                'password' => bcrypt($validated["password"])
            ]);
    }
}