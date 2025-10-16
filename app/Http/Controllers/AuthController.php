<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected UserService $userService)
    {

    }

    public function login(Request $request): JsonResponse
    {

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $token = $this->userService->login($data);

        if (!$token) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer'
        ], 200);
    }

}
