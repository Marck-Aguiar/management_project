<?php

use Core\Teacher\TeacherController;
use Illuminate\Support\Facades\Route;

Route::post('/teacher', [TeacherController::class, 'store']);
Route::put('/teacher/{id}', [TeacherController::class, 'update']);
