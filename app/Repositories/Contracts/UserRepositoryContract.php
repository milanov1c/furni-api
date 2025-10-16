<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryContract extends BaseContract
{
    public function findByEmail(string $email): ?User;

}
