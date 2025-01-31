<?php

namespace Core\Activity;

use Illuminate\Http\Request;
use Core\Activity\DTOs\ActivityDTO;
use App\Http\Controllers\Controller;
use Core\Activity\DTOs\PaginationDTO;
use Core\Activity\Cases\CreateActivity;
use Core\Activity\Cases\GetTotalPoints;
use Core\Activity\Cases\PaginateActivity;
use Core\Activity\Cases\RecordGrade;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function store(Request $request, CreateActivity $case)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'points' => 'required|integer|min:0|max:100',
            'user_id' => 'required|exists:users,id',
            'discipline_id' => 'required|exists:disciplines,id',
        ]);

        $payload = new ActivityDTO(
            title: $data['title'],
            description: $data['description'],
            points: $data['points'],
            userID: $data['user_id'],
            disciplineID: $data['discipline_id'],
        );

        return $case->execute($payload);
    }

    public function getTotalPoints(Request $request, GetTotalPoints $case)
    {
        $userID = $request->userID ?? Auth::id();

        return $case->execute($userID);
    }


    public function paginateActivity(Request $request, PaginateActivity $case)
    {
        $data = $request->validate([
            'per_page' => 'nullable|integer|min:1',
            'current_page' => 'nullable|integer|min:1',
        ]);

        $userID = $request->userID ?? Auth::id();

        $payload = new PaginationDTO(
            perPage: $data['per_page'] ?? 10,
            currentPage: $data['current_page'] ?? 1,
        );

        return $case->execute($userID, $payload);
    }


    public function recordGrade(Request $request, RecordGrade $case, $activityID)
    {
        $data = $request->validate([
            'grade' => 'required|integer|min:0|max:100',
        ]);

        return $case->execute($activityID, $data['grade']);
    }
}
