<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderProductRepositoryContract;

class OrderProductRepository extends BaseRepository implements OrderProductRepositoryContract
{
    public function __construct(protected Order $order)
    {
        parent::__construct($order);
    }

    public function attachProducts(int $orderId, array $products)
    {
        $order = $this->order->findOrFail($orderId);
        $attachData = [];
        foreach ($products as $item) {
            $attachData[$item['id']] = ['quantity' => $item['quantity']];
        }
        $order->products()->attach($attachData);
    }
}
