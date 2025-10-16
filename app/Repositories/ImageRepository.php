<?php

namespace App\Repositories;

use App\Models\Image;

final class ImageRepository extends BaseRepository
{
    public function __construct(protected Image $image)
    {

    }

    public function isMain(Image $image){
        return $image->is_main;
    }

    public function isMainById(int $id){
        return $this->model->findOrFail($id)->is_main;
    }
}
