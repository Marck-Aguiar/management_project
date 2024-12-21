<?php

namespace Core\Activity\Cases;

use Core\Activity\Models\Activity;
use Core\Activity\DTOs\PaginationDTO;

class PaginateActivity
{
    public function execute(int $userID, PaginationDTO $payload)
    {
        return Activity::where('user_id', $userID)
            ->paginate(perPage: $payload->perPage, page: $payload->currentPage);
    }
}
