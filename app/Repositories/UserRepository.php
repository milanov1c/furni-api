<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;

class UserRepository extends BaseRepository implements UserRepositoryContract
{
    public function __construct(protected User $user)
    {
        parent::__construct($this->user);
    }


    public function findByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }
}
