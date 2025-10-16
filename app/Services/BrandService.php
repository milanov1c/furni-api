<?php

namespace App\Services;

use App\Models\Brand;
use App\Repositories\BrandRepository;
use App\Repositories\Contracts\BaseContract;
use App\Services\Contract\BaseServiceContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Mod;

class BrandService implements BaseServiceContract
{
    public function __construct(protected BrandRepository $repository)
    {
        //
    }

    public function find(int $id): ?Model
    {
        return $this->repository->find($id);
    }

    public function findAll(): Collection
    {
        return $this->repository->findAll();
    }

    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): Model
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
