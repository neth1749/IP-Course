<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

// Public welcome page
Route::get('/', function () {
    return view('welcome');
});


// Upload file form page
Route::get('/upload_file', function () {
    return view('upload_file');
});

// Handle upload POST request
Route::post('/upload', [UploadController::class, 'upload'])->name('upload');


