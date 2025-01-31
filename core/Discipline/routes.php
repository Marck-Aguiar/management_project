<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisciplineController;

Route::post('/disciplines', [DisciplineController::class, 'store'])->name('disciplines.store');
Route::get('/disciplines/{discipline_id}/activities', [DisciplineController::class, 'listActivities'])->name('disciplines.listActivities');
Route::get('/disciplines/{discipline_id}/average', [DisciplineController::class, 'averageActivities'])->name('disciplines.averageActivities');
Route::put('/disciplines/{discipline_id}', [DisciplineController::class, 'update'])->name('disciplines.update');
