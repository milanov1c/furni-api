<?php

namespace App\Repositories\Contracts;

use App\Models\Furniture;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface FurnitureRepositoryContract extends BaseContract
{
    public function findWithRelationsDetailed(int $id): ?Furniture;

    public function findByCategory(int $category): Collection;

    public function findByBrand(int $brand): Collection;

    public function findByColor(int $color): Collection;
}
