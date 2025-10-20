<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->findAll());
    }

    public function show($id)
    {
        $item = $this->service->find($id);
        if (!$item) return response()->json(['message' => 'Category not found'], 404);
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:255']);
        return response()->json($this->service->create($data), 201);
    }

    public function update(Request $request, $id)
    {
        $item = $this->service->find($id);
        if (!$item) return response()->json(['message' => 'Category not found'], 404);

        $data = $request->validate(['name' => 'required|string|max:255']);
        return response()->json($this->service->update($id, $data));
    }

    public function destroy($id)
    {
        $deleted = $this->service->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json(['message' => 'Category deleted']);
    }


}
