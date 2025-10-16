<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\Contracts\BaseContract;
use App\Services\Contract\BaseServiceContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryService implements BaseServiceContract
{
    public function __construct(protected CategoryRepository $repository)
    {

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
}
