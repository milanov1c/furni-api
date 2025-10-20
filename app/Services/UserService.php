<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\Contract\UserServiceContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceContract
{
    public function __construct(protected UserRepository $repository)
    {
        //
    }

    public function find(int $id): ?Model
    {
        return $this->repository->find($id);
    }

    public function findAll(): Collection
    {
        return $this->repository->findAll();
    }

    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): Model
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->repository->findByEmail($email);
    }

    public function login(array $data): ?string
    {
        $user = $this->repository->findByEmail($data['email']);

        if (!$user) {
            return null;
        }

        if (!Hash::check($data['password'], $user->password)) {
            return null;
        }

        return $user->createToken('api_token')->plainTextToken;
    }

    public function getAuthenticatedUser(): ?User
    {
        $user = auth()->user();
        return $this->repository->findWithAddresses($user->id);
    }

    public function updateUser(array $data)
    {
        $user = auth()->user();

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        if (isset($data['addresses'])) {
            foreach ($data['addresses'] as $addrData) {
                if (isset($addrData['id'])) {
                    $user->addresses()->where('id', $addrData['id'])->update($addrData);
                } else {
                    $user->addresses()->create($addrData);
                }
            }
        }

        return $user->load('addresses');
    }

}
