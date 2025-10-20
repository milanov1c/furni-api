<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    protected Category $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function find(int $id): ?Category
    {
        return $this->model->find($id);
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function create(array $data): Category
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): ?Category
    {
        $category = $this->find($id);
        if (!$category) return null;

        $category->update($data);
        return $category;
    }

    public function delete(int $id): bool
    {
        $category = $this->find($id);
        if (!$category) return false;

        return $category->delete();
    }
}
