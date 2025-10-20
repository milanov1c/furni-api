<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BrandService;

class BrandController extends Controller
{
    protected BrandService $service;

    public function __construct(BrandService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $brands = $this->service->findAll();
        return response()->json($brands);
    }

    public function show($id)
    {
        $brand = $this->service->find($id);
        if (!$brand) {
            return response()->json(['message' => 'Brand not found'], 404);
        }
        return response()->json($brand);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = $this->service->create($data);
        return response()->json($brand, 201);
    }

    public function update(Request $request, $id)
    {
        $brand = $this->service->find($id);
        if (!$brand) {
            return response()->json(['message' => 'Brand not found'], 404);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $updated = $this->service->update($id, $data);
        return response()->json($updated);
    }

    public function destroy($id)
    {
        $deleted = $this->service->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Brand not found'], 404);
        }

        return response()->json(['message' => 'Brand deleted']);
    }


}
