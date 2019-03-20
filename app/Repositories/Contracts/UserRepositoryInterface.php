<?php
namespace App\Repositories\Contracts;


use App\User;


interface UserRepositoryInterface
{
    
    /**
     * Create a new user in the database.
     *
     * @param  array  $data
     * @return \Tricks\User
     */
    public function create(array $data);
    
}