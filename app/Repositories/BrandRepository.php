<?php

namespace App\Repositories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class BrandRepository
{
    protected Brand $model;

    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

    public function find(int $id): ?Brand
    {
        return $this->model->find($id);
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function create(array $data): Brand
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): ?Brand
    {
        $brand = $this->find($id);
        if (!$brand) return null;

        $brand->update($data);
        return $brand;
    }

    public function delete(int $id): bool
    {
        $brand = $this->find($id);
        if (!$brand) return false;

        return $brand->delete();
    }
}
