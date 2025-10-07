<?php

namespace App\Repositories;

use App\Models\Category;

final class CategoryRepository extends BaseRepository
{
    public function __construct(Protected Category $category)
    {
        parent::__construct($this->category);
    }
}
