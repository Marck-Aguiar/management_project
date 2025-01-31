<?php

namespace Core\Activity\Cases;

use Core\User\Models\User;
use Core\Activity\Models\Activity;
use Core\Activity\DTOs\ActivityDTO;
use Core\Discipline\Models\Discipline;

class CreateActivity
{
    public function execute(ActivityDTO $payload)
    {
        Activity::create([
            'title' => $payload->title,
            'description' => $payload->description,
            'points' => $payload->points,
            'status' => 'pendente',
            'discipline_id' => $payload->disciplineID,
            'user_id' => $payload->userID,
        ]);

        $this->updateUserPoints($payload->userID);

        return ['activity_created' => true];
    }

    private function updateUserPoints(int $userID)
    {
        $case = app(GetTotalPoints::class);
        $userPoints = $case->execute($userID);

        $user = User::findOrFail($userID);
        $user->total_points = $userPoints['total_points'];
        $user->save();
    }
}
