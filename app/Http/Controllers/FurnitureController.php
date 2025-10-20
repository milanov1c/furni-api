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

        ;

        $flat = [
            'id' => $furniture->id,
            'name' => $furniture->name,
            'description' => $furniture->description,
            'price' => (float) $furniture->price,
            'brand' => $furniture->brand?->name,
            'category' => $furniture->category?->name,
            'main_image' => $furniture->images()->first()->image_path,
            'colors' => $furniture->colors->map(fn($c) => $c->name)->toArray(),
        ];


        return response()->json($flat);
    }


    public function destroy(int $id): JsonResponse
    {
        $furniture = $this->furnitureService->find($id);
        if (!$furniture) {
            return response()->json(['error' => 'Furniture not found'], 404);
        }

        try {
            $furniture->delete();
            return response()->json(['message' => 'Furniture soft deleted successfully']);
        } catch (\Exception $e) {
            \Log::error('Furniture deletion failed: '.$e->getMessage());
            return response()->json(['error' => 'Unable to delete furniture'], 500);
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'main_image' => 'nullable|image|max:2048', // validacija fajla
        ]);

        $furniture = $this->furnitureService->create($data);

        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $filename = time().'_'.$file->getClientOriginalName();


            $file->move(public_path('images'), $filename);

            $furniture->images()->create([
                'image_path' => $filename,
                'is_main' => 1,
            ]);
        }

        return response()->json($furniture, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'main_image' => 'nullable|image|max:2048',
        ]);

        $furniture = $this->furnitureService->update($id, $data);

        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);


            $furniture->images()->create([
                'image_path' => $filename,
                'is_main' => 1,
            ]);
        }

        return response()->json($furniture);
    }
}
