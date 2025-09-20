<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return response()->json($this->userService->getAllUsers());
    }

    public function store(Request $request)
    {
        $result = $this->userService->createUser($request->all());

        if (isset($result['errors'])) {
            return response()->json($result['errors'], 422);
        }

        return response()->json($result, 201);
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $result = $this->userService->updateUser($id, $request->all());

        if ($result === null) {
            return response()->json(['error' => 'User not found'], 404);
        }

        if (isset($result['errors'])) {
            return response()->json($result['errors'], 422);
        }

        return response()->json($result);
    }

    public function destroy($id)
    {
        $deleted = $this->userService->deleteUser($id);

        if (!$deleted) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json(['message' => 'User deleted successfully']);
    }
}
