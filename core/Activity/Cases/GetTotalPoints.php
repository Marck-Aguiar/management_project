<?php

namespace Core\Activity\Cases;

use Core\Activity\Models\Activity;

class GetTotalPoints
{
    public function execute(int $userID)
    {
        $totalPoints = Activity::where('user_id', $userID)
            ->whereNotNull('points')
            ->sum('points');

        return [
            "user_id" => $userID,
            "total_points" => $totalPoints
        ];
    }
}
