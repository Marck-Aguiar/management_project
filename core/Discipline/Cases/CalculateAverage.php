<?php

namespace Core\Discipline\Cases;

use Core\Discipline\Models\Discipline;

class AverageDisciplineActivities
{
    public function execute(int $disciplineID)
    {
        $discipline = Discipline::with('activities')->findOrFail($disciplineID);

        $evaluatedActivities = $discipline->activities()->whereNotNull('points')->where('status', 'avaliado')->get();

        if ($evaluatedActivities->isEmpty()) {
            return ['average' => 0];
        }

        $average = $evaluatedActivities->avg('points');

        return [
            'discipline_id' => $discipline->id,
            'average_points' => $average,
        ];
    }
}
