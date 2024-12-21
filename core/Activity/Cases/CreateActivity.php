<?php

namespace Core\Activity\Cases;

use Core\User\Models\User;
use Core\Activity\Models\Activity;
use Core\Activity\DTOs\ActivityDTO;

class CreateActivity
{
    public function execute(ActivityDTO $payload)
    {
        Activity::create([
            'description' => $payload->description,
            'points' => $payload->points,
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
