<?php

namespace App\Repositories;


use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryContract;

class OrderRepository extends BaseRepository implements OrderRepositoryContract
{
    public function __construct(protected Order $order)
    {
        parent::__construct($order);
    }

    public function createOrder(array $data): Order
    {
        return $this->order->create($data);
    }

    public function orderDetailed(int $id) :Order{
        return $this->order->with(['user', 'products'])->find($id);
    }
}
