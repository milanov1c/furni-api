<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\OrderProductRepository;
use App\Services\Contract\OrderServiceContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderService implements OrderServiceContract
{
    public function __construct(
        protected OrderRepository $orderRepository,
        protected OrderProductRepository $orderProduct
    ) {}

    public function find(int $id): ?Model
    {
        return $this->orderRepository->find($id);
    }

    public function findAll(): Collection
    {
        return $this->orderRepository->findAll();
    }

    public function create(array $data): Model
    {
        return $this->orderRepository->create($data);
    }

    public function update(int $id, array $data): Model
    {
        return $this->orderRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->orderRepository->delete($id);
    }

    public function createOrderWithProducts(array $orderData, array $products): Model
    {
        return DB::transaction(function () use ($orderData, $products) {
            $order = $this->orderRepository->createOrder($orderData);
            $this->orderProduct->attachProducts($order->id, $products);
            return $order->load(['user', 'products']);
        });
    }

    public function orderDetailed(int $id): ?Model
    {
        return $this->orderRepository->orderDetailed($id);
    }
}
