<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Database\Eloquent\Model;

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


    public function findWithAddresses(int $id):?User{
        return $this->model->with('addresses')->find($id);
    }

}
