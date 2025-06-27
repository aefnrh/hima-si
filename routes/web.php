<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AspirationController;
use App\Http\Controllers\KabinetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('web')->name('home');

// Division routes
Route::get('/divisi', [DivisionController::class, 'index'])->name('divisions.index');
Route::get('/divisi/{slug}', [DivisionController::class, 'show'])->name('divisions.show');

// Event routes
Route::get('/acara', [EventController::class, 'index'])->name('events.index');
Route::get('/acara/semua', [EventController::class, 'allPastEvents'])->name('events.all');
Route::get('/acara/divisi/{slug}', [EventController::class, 'eventsByDivision'])->name('events.division');
Route::get('/acara/divisi/{slug}/semua', [EventController::class, 'allEventsByDivision'])->name('events.division.all');
Route::get('/acara/{slug}', [EventController::class, 'show'])->name('events.show');

// Aspiration routes
Route::get('/aspirasi', [AspirationController::class, 'index'])->name('aspirations.index');
Route::get('/aspirasi/create', [AspirationController::class, 'create'])->name('aspirations.create');
Route::post('/aspirasi', [AspirationController::class, 'store'])->name('aspirations.store');

// Cabinet routes
Route::get('/kabinet', [KabinetController::class, 'index'])->name('kabinet.index');
Route::get('/kabinet/{id}', [KabinetController::class, 'show'])->name('kabinet.show');

// Club routes
Route::get('/komunitas', [App\Http\Controllers\ClubController::class, 'index'])->name('clubs.index');
Route::get('/komunitas/{slug}', [App\Http\Controllers\ClubController::class, 'show'])->name('clubs.show');

Route::get('/about', function () {
    return view('pages.about');
})->name('about.index');

Route::get('/galeri', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
Route::get('/galeri/semua', [App\Http\Controllers\GalleryController::class, 'all'])->name('gallery.all');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Newsletter routes
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/subscribers', [App\Http\Controllers\NewsletterController::class, 'index'])->name('newsletter.subscribers');

Route::get('/dashboard', function () {
    return view('user-dashboard');
})->middleware('web')->name('dashboard');

Route::group([], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
