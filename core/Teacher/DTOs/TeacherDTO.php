<?php

namespace Core\Teacher\DTOs;

class TeacherDTO
{
    public string $name;
    public string $email;
    public int $disciplineID;

    public function __construct(string $name, string $email, int $disciplineID)
    {
        $this->name = $name;
        $this->email = $email;
        $this->disciplineID = $disciplineID;
    }
}
