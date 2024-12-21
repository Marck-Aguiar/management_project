<?php

namespace Core\User\Cases;

use Core\User\Models\User;
use Core\User\DTOs\PaginationDTO;

class RankingUser
{
    public function execute(PaginationDTO $payload)
    {
        return User::orderBy('total_points', 'desc')->whereNotNull('total_points')
            ->paginate(perPage: $payload->perPage, page: $payload->currentPage);
    }
}
