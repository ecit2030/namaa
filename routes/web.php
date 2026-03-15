<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ComingSoonController;
use App\Http\Controllers\BookConsultationController;

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing.index');
Route::get('/landing/{slug}', [LandingPageController::class, 'show'])->name('landing.show');

// Contact & Coming Soon (public, use landing layout)
Route::get('/contact', ContactController::class)->name('contact');
Route::get('/coming-soon', ComingSoonController::class)->name('coming-soon');

// Book a consultation (form + contact)
Route::get('/book-consultation', [BookConsultationController::class, 'show'])->name('book-consultation');
Route::post('/book-consultation', [BookConsultationController::class, 'store'])->name('book-consultation.store');

Route::middleware(['auth'])
    ->group(function () {
            
});

Route::post('/locale', LocaleController::class)->name('locale.set')->middleware('throttle:10,1');


use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// --- BREEZE MERGED CONTENT END ---
