<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Auth::routes([
    'register' => false, // Registration Routes...
    'reset'    => false, // Password Reset Routes...
    'verify'   => false, // Email Verification Routes...
]);

Route::get('/', [Controllers\HomeController::class, 'index']);
Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/votes', [Controllers\VoteController::class, 'index'])->name('votes');

/**
 * Auth Middleware
 * All routes wrapped inside this middleware needs authentication
 */
Route::middleware(['auth'])->group(function () {

    // Vote
    Route::get('/votes/create', [Controllers\VoteController::class, 'create']);
    Route::post('/votes/store', [Controllers\VoteController::class, 'store']);
    Route::get('/votes/{candidate}/edit', [Controllers\VoteController::class, 'edit']);
    Route::post('/votes/{candidate}/update', [Controllers\VoteController::class, 'update']);

    // Candidate
    Route::get('/candidates', [Controllers\CandidateController::class, 'index'])->name('candidates');
    Route::get('/candidates/create', [Controllers\CandidateController::class, 'create']);
    Route::post('/candidates/store', [Controllers\CandidateController::class, 'store']);
    Route::get('/candidates/{candidate}/edit', [Controllers\CandidateController::class, 'edit']);
    Route::post('/candidates/{candidate}/update', [Controllers\CandidateController::class, 'update']);    

    // User
    Route::get('/users', [Controllers\UserController::class, 'index'])->name('users');
    Route::get('/users/create', [Controllers\UserController::class, 'create']);
    Route::post('/users/store', [Controllers\UserController::class, 'store']);
    Route::get('/users/{user}/edit', [Controllers\UserController::class, 'edit']);
    Route::post('/users/{user}/update', [Controllers\UserController::class, 'update']);
});
