<?php

namespace Core\User\Cases;

use Core\User\Models\User;
use Core\User\DTOs\UserDTO;
use Illuminate\Support\Facades\Hash;

class CreateUser
{
    public function execute(UserDTO $payload)
    {
        User::create([
            'name' => $payload->name,
            'email' => $payload->email,
            'password' => Hash::make($payload->password),
        ]);

        return ['user_created' => true];
    }
}
