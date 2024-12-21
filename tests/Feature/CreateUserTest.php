<?php

namespace Tests\Feature;

use Tests\TestCase;
use Core\DTOs\UserDTO;
use Core\User\Cases\CreateUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_user(): void
    {
        $case = app(CreateUser::class);

        $payload = new UserDTO(
            name: 'Marcelo',
            email: 'marcelo@mail.com',
            password: Hash::make('Senha123'),
        );

        $case->execute($payload);

        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users', [
            'name' => 'Marcelo',
            'email' => 'marcelo@mail.com',
        ]);
    }
}
