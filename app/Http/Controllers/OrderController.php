<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(protected OrderService $orderService) {}

    public function index(): JsonResponse
    {
        $orders = $this->orderService->findAll();
        return response()->json($orders);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|exists:furniture,id',
            'products.*.quantity' => 'required|integer|min:1'
        ]);

        $furnitureIds = collect($data['products'])->pluck('id');
        $furnitures = \App\Models\Furniture::whereIn('id', $furnitureIds)->get()->keyBy('id');

        $total = collect($data['products'])->sum(function ($item) use ($furnitures) {
            $furniture = $furnitures->get($item['id']);
            return $furniture ? $furniture->price * $item['quantity'] : 0;
        });

        $orderData = [
            'user_id' => $request->user()->id,
            'date_ordered' => now(),
            'total' => $total
        ];

        $order = $this->orderService->createOrderWithProducts($orderData, $data['products']);

        return response()->json([
            'message' => 'Order created successfully',
            'order' => $order
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $order = $this->orderService->orderDetailed($id);
        return response()->json($order);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->orderService->delete($id);
        return response()->json(['message' => 'Order deleted successfully']);
    }
}
