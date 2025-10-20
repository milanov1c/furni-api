<?php

namespace App\Repositories\Contracts;

use App\Models\Order;

interface OrderRepositoryContract extends BaseContract
{
    public function createOrder(array $data): Order;

    public function orderDetailed(int $id): Order;
}
