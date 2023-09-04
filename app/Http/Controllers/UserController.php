<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        // return view('users.index', compact('users'));
        return UserResource::collection($users);
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        // return view('users.show', compact('user'));
        return new UserResource($user);
    }

    // public function create()
    // {
    //     return view('users.create');
    // }

    public function store(Request $request)
    {
        // $data = $request->all();
        // $this->userService->createUser($data);
        // return redirect()->route('users.index');
        $data = $request->all();
        $user = $this->userService->createUser($data);
        return new UserResource($user);
    }

    // public function edit($id)
    // {
    //     $user = $this->userService->getUserById($id);
    //     return view('users.edit', compact('user'));
    // }

    public function update(Request $request, $id)
    {
        // $data = $request->all();
        // $this->userService->updateUser($id, $data);
        // return redirect()->route('users.index');
        $data = $request->all();
        $user = $this->userService->updateUser($id, $data);
        return new UserResource($user);
    }

    public function destroy($id)
    {
        // $this->userService->deleteUser($id);
        // return redirect()->route('users.index');
        $this->userService->deleteUser($id);
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function customers()
    {
        $customers = User::where('role', '=', 'customer')->get();
        return response()->json($customers, 200);
    }
}
