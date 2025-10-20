<?php

namespace App\Services\Contract;

use Illuminate\Database\Eloquent\Model;

interface OrderServiceContract extends BaseServiceContract
{
    public function createOrderWithProducts(array $orderData, array $products);

    public function orderDetailed(int $id): ?Model;
}
