<?php

use App\Http\Controllers\API\NotesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/hi/{id}', [UserController::class, 'HI']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/store', [NotesController::class, 'store']);
    Route::get('/show/{id}', [NotesController::class, 'show']);
    Route::put('/updata/{id}/{text_id}', [NotesController::class, 'update']);
    Route::delete('/delete/{id}/{text_id}', [NotesController::class, 'destroy']);
});
