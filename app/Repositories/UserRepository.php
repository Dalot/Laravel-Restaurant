<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

/**
 * Interface UserRepository
 * @package namespace App\Repositories;
 */

class UserRepository implements UserRepositoryInterface
{
    public function create($user)
    {
        $user = User::create([
                    'name' => $user["name"],
                    'email' => $user["email"],
                    'password' => bcrypt($user["password"]),
                ]);
        
        return [
            'user' => $user,
            'token' => $user->createToken('restaurant')->accessToken
            ];
            
    }
}