<?php

namespace App\Services;

use App\Models\Furniture;
use App\Repositories\FurnitureRepository;
use App\Services\Contract\FurnitureServiceContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class FurnitureService implements FurnitureServiceContract
{
    public function __construct(protected FurnitureRepository $repository)
    {

    }

    public function find(int $id): ?Furniture
    {
        return $this->repository->find($id);
    }

    public function findAll(): Collection
    {
        return $this->repository->findAll();
    }
//je l treba ovde da pise create(array $data=[])
    public function create(array $data): Furniture
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): Furniture
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function findWithRelationsDetailed(int $id): ?Furniture
    {
        return $this->repository->findWithRelationsDetailed($id);
    }

    public function findByCategory(int $category): Collection
    {
        return $this->repository->findByCategory($category);
    }

    public function findByBrand(int $brand): Collection
    {
        return $this->repository->findByBrand($brand);
    }

    public function findByColor(int $color): Collection
    {
        return $this->repository->findByColor($color);
    }
}
