<?php

namespace Core\Activity\Cases;

use Core\Activity\Models\Activity;
use Core\Discipline\Models\Discipline;
use Core\User\Models\User;

class DeleteActivity
{
    public function execute(int $activityID, int $userID)
    {
        $activity = Activity::find($activityID);

        if (!$activity) {
            throw new \Exception("Activity not found.");
        }

        $discipline = Discipline::find($activity->discipline_id);

        if (!$discipline || $discipline->teacher_id !== $userID) {
            throw new \Exception("Unauthorized: You can only delete activities in your own discipline.");
        }

        $activity->delete();

        return ['activity_deleted' => true];
    }
}
