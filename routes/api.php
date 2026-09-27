<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes for Wat School Mobile & Web Application
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {
    // Home summary & stats
    Route::get('/home', [ApiController::class, 'home'])->name('api.home');
    
    // Pagoda details
    Route::get('/pagoda', [ApiController::class, 'pagoda'])->name('api.pagoda');
    
    // School endpoints
    Route::get('/school', [ApiController::class, 'school'])->name('api.school');
    Route::post('/school/admissions', [ApiController::class, 'submitAdmission'])->name('api.school.admissions');
    
    // Posts & News
    Route::get('/posts', [ApiController::class, 'posts'])->name('api.posts.index');
    Route::get('/posts/{slugOrId}', [ApiController::class, 'postDetail'])->name('api.posts.show');
    
    // Dhamma Library
    Route::get('/dhamma', [ApiController::class, 'dhamma'])->name('api.dhamma.index');
    Route::get('/dhamma/{slugOrId}', [ApiController::class, 'dhammaDetail'])->name('api.dhamma.show');
    
    // Events & Ceremonies
    Route::get('/events', [ApiController::class, 'events'])->name('api.events.index');
    Route::get('/events/{slugOrId}', [ApiController::class, 'eventDetail'])->name('api.events.show');
    
    // Gallery
    Route::get('/gallery', [ApiController::class, 'gallery'])->name('api.gallery');
    
    // Donations
    Route::get('/donations', [ApiController::class, 'donations'])->name('api.donations');
    
    // Contact
    Route::post('/contact', [ApiController::class, 'submitContact'])->name('api.contact');
});

// Default fallback / without version prefix for quick access
Route::get('/home', [ApiController::class, 'home']);
Route::get('/pagoda', [ApiController::class, 'pagoda']);
Route::get('/school', [ApiController::class, 'school']);
Route::post('/school/admissions', [ApiController::class, 'submitAdmission']);
Route::get('/posts', [ApiController::class, 'posts']);
Route::get('/posts/{slugOrId}', [ApiController::class, 'postDetail']);
Route::get('/dhamma', [ApiController::class, 'dhamma']);
Route::get('/dhamma/{slugOrId}', [ApiController::class, 'dhammaDetail']);
Route::get('/events', [ApiController::class, 'events']);
Route::get('/events/{slugOrId}', [ApiController::class, 'eventDetail']);
Route::get('/gallery', [ApiController::class, 'gallery']);
Route::get('/donations', [ApiController::class, 'donations']);
Route::post('/contact', [ApiController::class, 'submitContact']);
