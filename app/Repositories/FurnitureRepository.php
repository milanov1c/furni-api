<?php

namespace App\Repositories;


use App\Models\Furniture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

final class FurnitureRepository extends BaseRepository
{
    public function __construct(protected Furniture $furniture)
    {
        parent::__construct($this->furniture);
    }

    public function findWithRelationsDetailed(int $id): ?Model
    {
        return $this->model->with(['brand', 'category', 'colors']);
    }

    public function findByCategory(int $category): Collection
    {
        return $this->model->where('category_id', $category)->get();
    }

    public function findByBrand(int $brand): Collection
    {
        return $this->model->where('brand_id', $brand)->get();
    }

    public function findByColor(int $color): Collection
    {
        return $this->model->whereHas('colors', fn($q) => $q->where('color_id', $color))->get();
    }


}
