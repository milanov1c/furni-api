<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Services\FurnitureService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class FurnitureController extends Controller
{
    public function __construct(protected FurnitureService $furnitureService)
    {

    }


    public function index(): JsonResponse
    {
        $furnitures = $this->furnitureService->findAll();
        return response()->json($furnitures);
    }

    public function show(int $id): JsonResponse
    {
        $furniture = $this->furnitureService->findWithRelationsDetailed($id);

        if (!$furniture) {
            return response()->json(['error' => 'Furniture not found'], 404);
        }

        return response()->json($furniture);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
        ]);

        $furniture = $this->furnitureService->create($data);

        return response()->json($furniture, 201);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->furnitureService->delete($id);

        if ($deleted) {
            return response()->json(['message' => 'Furniture deleted successfully']);
        }

        return response()->json(['error' => 'Failed to delete furniture'], 400);
    }



}
