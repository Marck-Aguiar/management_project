<?php

namespace Core\Discipline\Cases;

use Core\Discipline\Models\Discipline;

class ListActivities
{
    public function execute(int $disciplineID)
    {
        $discipline = Discipline::findOrFail($disciplineID);

        $activities = $discipline->activities;

        return [
            "discipline_id" => $disciplineID,
            "activities" => $activities
        ];
    }
}
