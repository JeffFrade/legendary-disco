<?php

namespace App\Services;

use App\Exceptions\UserDuplicatedException;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function store(array $data)
    {
        $user = $this->userRepository->findFirst('email', $data['email']);

        if (!empty($user)) {
            throw new UserDuplicatedException('E-mail já atrelado a outro usuário');
        }

        $data['password'] = Hash::make($data['password']);

        return $this->userRepository->create($data);
    }
}
