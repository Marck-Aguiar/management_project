<?php

namespace Core\User;

use Core\User\DTOs\UserDTO;
use Illuminate\Http\Request;
use Core\User\Cases\CreateUser;
use Core\User\Cases\UpdateUser;
use Core\User\Cases\RankingUser;
use Core\User\Cases\PaginateUser;
use Core\User\DTOs\PaginationDTO;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function paginateUser(Request $request, PaginateUser $case)
    {
        $data = $request->validate([
            'per_page' => 'nullable',
            'current_page' => 'nullable',
        ]);

        $payload = new PaginationDTO(
            perPage: $data['per_page'] ?? 10,
            currentPage: $data['current_page'] ?? 1,
        );

        return $case->execute($payload);
    }

    public function store(Request $request, CreateUser $case)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $payload = new UserDTO(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
        );

        return $case->execute($payload);
    }

    public function update(Request $request, UpdateUser $case)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $payload = new UserDTO(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
        );

        return $case->execute($request->id, $payload);
    }

    public function rankingUser(Request $request, RankingUser $case)
    {
        $data = $request->validate([
            'per_page' => 'nullable',
            'current_page' => 'nullable',
        ]);

        $payload = new PaginationDTO(
            perPage: $data['per_page'] ?? 10,
            currentPage: $data['current_page'] ?? 1,
        );

        return $case->execute($payload);
    }
}
