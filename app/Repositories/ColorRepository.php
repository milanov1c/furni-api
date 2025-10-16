<?php

namespace App\Repositories;

use App\Models\Color;

final class ColorRepository extends BaseRepository
{
    public function __construct(protected Color $color)
    {
        parent::__construct($this->color);
    }
}
