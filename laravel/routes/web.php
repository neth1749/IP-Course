<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public welcome page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (requires authenticated & email-verified users)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// All /profile routes require authentication
Route::middleware('auth')->group(function () {
    // Show the profile edit form (GET /profile)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    // Update profile (PATCH /profile)
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Delete account (DELETE /profile)
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
