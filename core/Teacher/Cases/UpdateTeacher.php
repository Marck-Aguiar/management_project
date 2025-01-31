<?php

namespace Core\Teacher\Cases;

use Core\Teacher\DTOs\TeacherDTO;
use Core\Teacher\Models\Teacher;
use Exception;

class UpdateTeacher
{
    public function execute(int $id, TeacherDTO $payload)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->fill([
            'name' => $payload->name,
            'email' => $payload->email,
            'discipline_id' => $payload->disciplineID,
        ]);

        $teacher->save();

        return ['teacher_updated' => true];
    }
}
