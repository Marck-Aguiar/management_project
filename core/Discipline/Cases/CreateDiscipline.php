<?php

namespace Core\Discipline\Cases;

use Core\Discipline\Models\Discipline;
use Core\Discipline\DTOs\DisciplineDTO;
use Exception;

class CreateDiscipline
{
    public function execute(DisciplineDTO $payload)
    {
        if (Discipline::where('name', $payload->name)->where('teacher_id', $payload->teacherID)->exists()) {
            throw new Exception("Esta disciplina já existe para o professor.");
        }

        $discipline = Discipline::create([
            'name' => $payload->name,
            'description' => $payload->description,
            'teacher_id' => $payload->teacherID,
        ]);

        return ['discipline_created' => true, 'discipline_id' => $discipline->id];
    }
}
