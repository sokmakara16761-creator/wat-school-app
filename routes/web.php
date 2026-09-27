<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagodaController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DhammaController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Pagoda Section
Route::get('/pagoda/about', [PagodaController::class, 'about'])->name('pagoda.about');
Route::get('/pagoda/map', [PagodaController::class, 'map'])->name('pagoda.map');

// Buddhist Primary School Section
Route::prefix('school')->name('school.')->group(function () {
    Route::get('/', [SchoolController::class, 'index'])->name('index');
    Route::get('/curriculum', [SchoolController::class, 'curriculum'])->name('curriculum');
    Route::get('/teachers', [SchoolController::class, 'teachers'])->name('teachers');
    Route::get('/achievements', [SchoolController::class, 'achievements'])->name('achievements');
    Route::get('/admissions', [SchoolController::class, 'admissions'])->name('admissions');
    Route::post('/admissions', [SchoolController::class, 'storeAdmission'])->name('admissions.store');
    Route::get('/results', [SchoolController::class, 'results'])->name('results');
    Route::get('/results/{id}/slip', [SchoolController::class, 'resultSlip'])->name('results.slip');
    Route::get('/timetable', [SchoolController::class, 'timetable'])->name('timetable');
});

// Posts & News
Route::get('/news', [PostController::class, 'index'])->name('posts.index');
Route::get('/news/{slug}', [PostController::class, 'show'])->name('posts.show');

// Dhamma Library & Audio
Route::get('/dhamma', [DhammaController::class, 'index'])->name('dhamma.index');
Route::get('/dhamma/{slug}', [DhammaController::class, 'show'])->name('dhamma.show');

// Buddhist Videos & Live Streams
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('/videos/{slug}', [VideoController::class, 'show'])->name('videos.show');

// Events & Ceremonies
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Donation & E-Certificate
Route::get('/donation', [DonationController::class, 'index'])->name('donation.index');
Route::get('/donation/certificate', [DonationController::class, 'generateCertificate'])->name('donation.certificate');
Route::post('/donation/certificate', [DonationController::class, 'generateCertificate'])->name('donation.certificate.generate');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Management Portal
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admissions', [AdminController::class, 'admissions'])->name('admissions');
    Route::post('/admissions/{id}/status', [AdminController::class, 'updateAdmissionStatus'])->name('admissions.status');
    Route::get('/posts', [AdminController::class, 'posts'])->name('posts');
    Route::get('/posts/create', [AdminController::class, 'createPost'])->name('posts.create');
    Route::post('/posts', [AdminController::class, 'storePost'])->name('posts.store');
    Route::delete('/posts/{id}', [AdminController::class, 'deletePost'])->name('posts.delete');
    Route::get('/events', [AdminController::class, 'events'])->name('events');
    Route::get('/events/create', [AdminController::class, 'createEvent'])->name('events.create');
    Route::post('/events', [AdminController::class, 'storeEvent'])->name('events.store');
    Route::delete('/events/{id}', [AdminController::class, 'deleteEvent'])->name('events.delete');
    Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
    Route::post('/messages/{id}/read', [AdminController::class, 'markMessageRead'])->name('messages.read');
});
