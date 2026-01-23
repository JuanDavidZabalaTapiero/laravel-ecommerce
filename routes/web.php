<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// === CLIENT ===
Route::get('/', function () {
    return view('client.home');
})->name('home');

Route::get('/contact', function () {
    return view('client.contact');
})->name('contact');

// === ADMIN ===
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

// == PROFILE ==
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
