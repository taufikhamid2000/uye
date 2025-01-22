<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\BusinessProfileController;
use App\Http\Controllers\TekaTekiController;
use App\Http\Controllers\VeyoyeeController;
use App\Http\Controllers\JobMatchController;
use App\Http\Controllers\SlideMarketController;
use Illuminate\Support\Facades\Route;

// Default Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Public Listing Page (Outside Auth Middleware)
Route::get('/listings/public', [ListingController::class, 'publicIndex'])->name('listings.public');

// Group routes for authenticated and verified users
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Management
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Listing Management
    Route::prefix('listings')->name('listings.')->group(function () {
        Route::get('/', [ListingController::class, 'index'])->name('index');
        Route::get('/create', [ListingController::class, 'create'])->name('create');
        Route::post('/', [ListingController::class, 'store'])->name('store');
        Route::get('/{listing}/edit', [ListingController::class, 'edit'])->name('edit');
        Route::patch('/{listing}', [ListingController::class, 'update'])->name('update');
        Route::delete('/{listing}', [ListingController::class, 'destroy'])->name('destroy');
    });
});

// Admin-only routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return 'Welcome, Admin!';
    })->name('dashboard');
});

// Student-only routes
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/', function () {
        return 'Welcome, Student!';
    })->name('dashboard');
});

Route::middleware(['auth'])->prefix('business-profiles')->name('business-profiles.')->group(function () {
    Route::get('create', [BusinessProfileController::class, 'create'])->name('create');
    Route::post('store', [BusinessProfileController::class, 'store'])->name('store');
});

// Public route for viewing a business profile
Route::get('/business-profiles/{id}', [BusinessProfileController::class, 'show'])->name('business-profiles.show');
Route::get('/listings/{id}', [ListingController::class, 'show'])->name('listings.show');

Route::get('/teka-teki', [TekaTekiController::class, 'index'])->name('teka-teki.index');
Route::get('/veyoyee', [VeyoyeeController::class, 'index'])->name('veyoyee.index');
Route::get('/jobmatch', [JobMatchController::class, 'index'])->name('jobmatch.index');
Route::get('/slide-market', [SlideMarketController::class, 'index'])->name('slide-market.index');

// Auth Routes (Laravel Breeze)
require __DIR__ . '/auth.php';
