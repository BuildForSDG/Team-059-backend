<?php

namespace App\Services;

use App\Contracts\UserServiceInterface;
use App\Models\User;

/**
 * Inherits basic CRUD functionalities from BaseService
 */
class UserService extends BaseService implements UserServiceInterface
{
    /**
     * Constructing the User service with User model
     * 
     * @param App\Models\User
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}