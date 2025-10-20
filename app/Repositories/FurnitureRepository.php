<?php

namespace App\Repositories;


use App\Models\Color;
use App\Models\Furniture;
use App\Repositories\Contracts\FurnitureRepositoryContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

final class FurnitureRepository extends BaseRepository implements FurnitureRepositoryContract
{
    public function __construct(protected Furniture $furniture)
    {
        parent::__construct($this->furniture);
    }

    public function findAll(): Collection
    {
        return $this->model->with(['brand', 'category', 'colors', 'images'])
            ->whereNull('deleted_at')
            ->get();
    }

    public function findWithRelationsDetailed(int $id) :?Furniture
    {
        return $this->model
            ->with(['brand', 'category', 'colors', 'images' => fn($q) => $q->where('is_main', 1)])
            ->find($id);
    }


    public function findByCategory(int $categoryId): Collection
    {
        return $this->model->where('category_id', $categoryId)->get();
    }

    public function findByBrand(int $brandId): Collection
    {
        return $this->model->where('brand_id', $brandId)->get();
    }

    public function findByColor(int $colorId): Collection
    {
        return $this->model->whereHas('colors', fn($q) => $q->where('color_id', $colorId))->get();
    }

    public function attachColors(int $furnitureId, array $colorsWithQuantities): void
    {
        $furniture = $this->model->findOrFail($furnitureId);
        $pivotData = [];

        foreach ($colorsWithQuantities as $colorId => $quantity) {
            $pivotData[$colorId] = ['quantity' => $quantity];
        }

        $furniture->colors()->sync($pivotData);
    }

    public function getAllImages(int $furnitureId)
    {
        return $this->model->findOrFail($furnitureId)->images;
    }

    public function mainImage(int $furnitureId)
    {
        return $this->model->findOrFail($furnitureId)->images()->where('is_main', true)->first();
    }


}
