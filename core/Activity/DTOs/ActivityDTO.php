<?php

namespace Core\Activity\DTOs;

class ActivityDTO
{
    function __construct(
        public string $title,
        public string $description,
        public int $points,
        public int $userID,
        public int $disciplineID
    ) {}
}
