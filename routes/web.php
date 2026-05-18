<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompetitionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;


Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/competitions', [CompetitionsController::class, 'index'])->name('competitions.index');
    Route::get('/admin/competitions/create', [CompetitionsController::class, 'create'])->name('competitions.create');
    Route::get('/admin/competitions/{id}/edit', [CompetitionsController::class, 'edit'])->name('competitions.edit');

    Route::post('/admin/competitions', [CompetitionsController::class, 'store'])->name('competitions.store');
    Route::put('/admin/competitions/{id}', [CompetitionsController::class, 'update'])->name('competitions.update');
    Route::delete('/admin/competitions/{id}', [CompetitionsController::class, 'destroy'])->name('competitions.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/competitions', [CompetitionsController::class, 'publicIndex'])->name('public.competitions.index');
Route::get('/competitions/{id}', [CompetitionsController::class, 'show'])->name('public.competitions.show');

// Profile (protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});