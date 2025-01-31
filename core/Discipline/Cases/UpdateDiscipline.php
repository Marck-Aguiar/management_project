<?php

namespace Core\Discipline\Cases;

use Core\Discipline\DTOs\DisciplineDTO;
use Core\Discipline\Models\Discipline;

class UpdateDiscipline
{
    public function execute(int $id, DisciplineDTO $payload)
    {
        $discipline = Discipline::findOrFail($id);

        $discipline->name = $payload->name;
        $discipline->description = $payload->description;
        $discipline->teacher_id = $payload->teacherID;

        $discipline->save();

        return ['discipline_updated' => true];
    }
}
