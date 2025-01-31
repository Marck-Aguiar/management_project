<?php

namespace Core\Teacher\Cases;

use Core\Teacher\Models\Teacher;
use Core\Teacher\DTOs\TeacherDTO;
use Exception;

class CreateTeacher
{
    public function execute(TeacherDTO $payload)
    {
        $teacher = Teacher::create([
            'name' => $payload->name,
            'email' => $payload->email,
            'discipline_id' => $payload->disciplineID,
        ]);

        return ['teacher_created' => true, 'teacher_id' => $teacher->id];
    }
}
