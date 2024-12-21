<?php

namespace Core\Activity\DTOs;

class PaginationDTO
{
    function __construct(
        public int $perPage,
        public int $currentPage
    ) {}
}
