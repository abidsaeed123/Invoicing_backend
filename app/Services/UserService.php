<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }

    public function getUserById($id)
    {
        return $this->userRepository->find($id);
    }

    public function createUser(array $data)
    {
        // You can perform any additional logic or validation here before creating the user
        return $this->userRepository->create($data);
    }

    public function updateUser($id, array $data)
    {
        // You can perform any additional logic or validation here before updating the user
        return $this->userRepository->update($id, $data);
    }

    public function deleteUser($id)
    {
        // You can perform any additional logic or validation here before deleting the user
        $this->userRepository->delete($id);
    }
}
