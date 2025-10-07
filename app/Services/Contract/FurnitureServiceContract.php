<?php

namespace App\Services\Contract;

use App\Models\Furniture;
use App\Repositories\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface FurnitureServiceContract extends BaseContract
{
    public function findWithRelationsDetailed(int $id): ?Furniture;

    public function findByCategory(int $category): Collection;

    public function findByBrand(int $brand): Collection;

    public function findByColor(int $color): Collection;


}
