<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
    }

    public function index() : JsonResponse
    {
        $users=$this->userService->findAll();
        return response()->json($users);
    }


    public function store(Request $request) : JsonResponse
    {
       $data=$request->validate([
           'name'=>'required|string|max:50',
           'email'=>'required|email',
           'password'=>'required|string|min:8',
           'role_id'=>'integer'
       ]);

       $user=$this->userService->create($data);

       return response()->json($user, 201);
    }


    public function show(string $email) : JsonResponse
    {
        $user= $this->userService->findByEmail($email);
        if(!$user){
            return response()->json(['error'=>'User not found'], 404);
        }
        return response()->json($user);
    }



    public function destroy(string $id)
    {
        $deleted=$this->userService->delete($id);

        if($deleted){
            return response()->json(['message'=>'User deleted successfully']);
        }
        return response()->json(['error'=>'Failed to delete user']);
    }
}
