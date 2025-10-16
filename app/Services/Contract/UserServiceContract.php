<?php

namespace App\Services\Contract;

use App\Models\User;
use App\Repositories\Contracts\BaseContract;

interface UserServiceContract extends BaseContract
{

    public function findByEmail(string $email): ?User;
}
