<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Brand::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate(['name' => 'required|unique:brands,name|string|min:3']);

            $brand = Brand::create($data);

            return response()->json([
                'success' => true,
                'data' => $brand,
                'message' => 'Successfully created'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error in database occurred: ' . $e->getMessage()
            ], 400);

        } catch (\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error occurred: ',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An unknown error occurred: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public
    function show(string $id)
    {

        return Brand::findOrFail($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);

        try {
            $data = $request->validate(['name' => 'required|unique:brands,name|string|min:3']);
            $brand->update($data);
            return response()->json([
                'success' => true,
                'data' => $brand,
                'message' => 'Successfully created'
            ], 200);

        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error in database occurred: ' . $e->getMessage()
            ], 400);

        } catch (\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error occurred: ',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An unknown error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return response()->json(['message' => 'Brand deleted']);
    }
}
