<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\GenericResourceController;
use Illuminate\Support\Facades\Route;

// Default Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Public Listing Page (Outside Auth Middleware)
// Route::get('/listings/public', [ListingController::class, 'publicIndex'])->name('public.listings');
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

    // Dynamic Routes for Each Project
    // Route::prefix('{type}')->group(function () {
    //     Route::get('/', [GenericResourceController::class, 'index'])->name('listings.index');
    //     Route::get('/public', [GenericResourceController::class, 'publicIndex'])->name('listings.public');
    //     Route::get('/create', [GenericResourceController::class, 'create'])->name('listings.create');
    //     Route::post('/', [GenericResourceController::class, 'store'])->name('listings.store');
    //     Route::get('/{id}', [GenericResourceController::class, 'show'])->name('listings.show');
    //     Route::get('/{id}/edit', [GenericResourceController::class, 'edit'])->name('listings.edit');
    //     Route::put('/{id}', [GenericResourceController::class, 'update'])->name('listings.update');
    //     Route::delete('/{id}', [GenericResourceController::class, 'destroy'])->name('listings.destroy');
    // });
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

// Auth Routes (Laravel Breeze)
require __DIR__ . '/auth.php';
