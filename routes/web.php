<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompetitionsController;
use App\Http\Controllers\Admin\CreateController;

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/competitions', [CompetitionsController::class, 'index'])->name('competitions.index');
Route::get('/admin/competitions/create', [CreateController::class, 'index'])->name('competitions.create');
Route::get('/admin/competitions/{id}/edit', [CompetitionsController::class, 'edit'])->name('competitions.edit');
Route::get('/', function () {
    return view('welcome');
});