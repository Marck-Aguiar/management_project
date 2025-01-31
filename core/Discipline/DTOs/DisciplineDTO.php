<?php

namespace Core\Discipline\DTOs;

class DisciplineDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public int $teacherID
    ) {}
}
