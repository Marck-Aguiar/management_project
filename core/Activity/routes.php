<?php

use Core\Activity\ActivityController;
use Illuminate\Support\Facades\Route;

Route::post('/activity', [ActivityController::class, 'store']);
Route::get('/activity/points/{userID}', [ActivityController::class, 'getTotalPoints']);
Route::get('/activity/pagination_user_activities/{userID}', [ActivityController::class, 'paginateActivity']);
