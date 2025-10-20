<?php

namespace App\Repositories\Contracts;

interface OrderProductRepositoryContract extends BaseContract
{
    public function attachProducts(int $orderId, array $products);
}
