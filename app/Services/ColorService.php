<?php

namespace App\Services;

use App\Models\Color;
use App\Repositories\ColorRepository;
use App\Repositories\Contracts\BaseContract;
use App\Services\Contract\BaseServiceContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ColorService implements BaseServiceContract
{
    public function __construct(protected ColorRepository $repository)
    {
        //
    }

    public function find(int $id): ?Color
    {
        return $this->repository->find($id);
    }

    public function findAll(): Collection
    {
        return $this->repository->findAll();
    }

    public function create(array $data): Color
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): Color
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
