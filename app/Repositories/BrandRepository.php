<?php

namespace App\Repositories;

use App\Models\Brand;

final class BrandRepository extends BaseRepository
{
    public function __construct(Protected Brand $brand)
    {
        parent::__construct($this->brand);
    }
}
