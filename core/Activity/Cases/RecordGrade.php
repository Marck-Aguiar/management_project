<?php

namespace Core\Activity\Cases;

use Core\Activity\Models\Activity;
use Exception;

class RecordGrade
{
    public function execute(int $activityID, int $grade)
    {
        $activity = Activity::findOrFail($activityID);

        if ($grade > 100) {
            throw new Exception("A nota não poderá ultrapassar a nota máxima permitida de 100.");
        }

        $activity->points = $grade;

        $activity->status = 'evaluated';

        $activity->save();

        return [
            'activity_id' => $activity->id,
            'status' => 'graded',
            'grade' => $activity->points,
        ];
    }
}
