<?php

namespace Core\Activity;

use Illuminate\Http\Request;
use Core\Activity\DTOs\ActivityDTO;
use App\Http\Controllers\Controller;
use Core\Activity\DTOs\PaginationDTO;
use Core\Activity\Cases\CreateActivity;
use Core\Activity\Cases\GetTotalPoints;
use Core\Activity\Cases\PaginateActivity;

class ActivityController extends Controller
{
    public function store(Request $request, CreateActivity $case)
    {
        $data = $request->validate([
            'description' => 'required',
            'points' => 'required',
            'user_id' => 'required',
        ]);

        $payload = new ActivityDTO(
            description: $data['description'],
            points: $data['points'],
            userID: $data['user_id'],
        );

        return $case->execute($payload);
    }

    public function getTotalPoints(Request $request, GetTotalPoints $case)
    {
        return $case->execute($request->userID);
    }

    public function paginateActivity(Request $request, PaginateActivity $case)
    {
        $data = $request->validate([
            'per_page' => 'nullable',
            'current_page' => 'nullable',
        ]);

        $payload = new PaginationDTO(
            perPage: $data['per_page'] ?? 10,
            currentPage: $data['current_page'] ?? 1,

        );

        return $case->execute($request->userID, $payload);
    }
}
