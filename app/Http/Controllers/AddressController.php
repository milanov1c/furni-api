<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Services\AddressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct(protected AddressService $addressService)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'addresses' => Address::all()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'number'=>'required|integer|max:3',
            'zip' => 'required|string|max:20',
        ]);

        $address = $this->addressService->create($data);

        return response()->json($address, 201);
    }

    public function show(int $id): JsonResponse
    {
        $address = $this->addressService->getByUser($id);

        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        return response()->json($address);
    }

    public function update(Request $request, $id)
    {
        $address = $request->user()->addresses()->findOrFail($id);

        $data = $request->validate([
            'street' => 'required|string|max:255',
            'number' => 'required|string|max:50',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
        ]);

        $address->update($data);

        return response()->json($address);
    }

    public function destroy(int $id): JsonResponse
    {
        $address = Address::find($id);

        if (!$address) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        $address->delete();

        return response()->json(['message' => 'Address deleted successfully']);
    }

    public function userAddress(Request $request)
    {
        $user = $request->user();
        $address = $user->addresses()->first(); // uzmi prvu adresu

        if (!$address) {
            return response()->json(null);
        }

        return response()->json([
            'id' => $address->id,
            'street' => $address->street,
            'number' => $address->number,
            'city' => $address->city,
            'zip' => $address->zip,
        ]);
    }



}
