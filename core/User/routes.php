<?php

use Core\User\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/user', [UserController::class, 'store']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::get('/user/ranking_user', [UserController::class, 'rankingUser']);
Route::get('/user/paginate_user', [UserController::class, 'paginateUser']);
