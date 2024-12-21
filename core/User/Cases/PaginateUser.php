<?php

namespace Core\User\Cases;

use Core\User\Models\User;
use Core\User\DTOs\PaginationDTO;

class PaginateUser
{
    public function execute(PaginationDTO $payload)
    {
        return User::orderBy('id', 'desc')->paginate(perPage: $payload->perPage, page: $payload->currentPage);
    }
}
