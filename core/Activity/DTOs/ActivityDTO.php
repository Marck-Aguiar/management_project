<?php

namespace Core\Activity\DTOs;

class ActivityDTO {
    function __construct(
    public string $description,
    public int $points,
    public int $userID
    ) {}
}