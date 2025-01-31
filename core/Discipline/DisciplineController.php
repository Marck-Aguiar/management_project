<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Core\Discipline\DTOs\DisciplineDTO;
use Core\Discipline\Cases\CreateDiscipline;
use Core\Discipline\Cases\ListActivities;
use Core\Discipline\Cases\AverageDisciplineActivities;

class DisciplineController extends Controller
{
    public function store(Request $request, CreateDiscipline $case)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'teacher_id' => 'required|exists:users,id',
        ]);

        $payload = new DisciplineDTO(
            name: $data['name'],
            description: $data['description'],
            teacherID: $data['teacher_id']
        );

        return $case->execute($payload);
    }

    public function listActivities(Request $request, ListActivities $case)
    {
        $data = $request->validate([
            'discipline_id' => 'required|exists:disciplines,id',
        ]);

        return $case->execute($data['discipline_id']);
    }

    public function averageActivities(Request $request, AverageDisciplineActivities $case)
    {
        $data = $request->validate([
            'discipline_id' => 'required|exists:disciplines,id',
        ]);

        return $case->execute($data['discipline_id']);
    }
}
