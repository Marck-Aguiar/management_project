<?php

namespace Core\User\DTOs;

class PaginationDTO
{
    function __construct(
        public int $perPage,
        public int $currentPage
    ) {}
}
