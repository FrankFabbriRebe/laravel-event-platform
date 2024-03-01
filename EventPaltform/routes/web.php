<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EventController::class, 'index'])->name('event.index');

Route::get('/dashboard', [EventController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/create', [EventController::class, 'create'])->name('users.create');
    Route::post('/', [EventController::class, 'store'])->name('event.store');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('users.show');
    Route::get('/{id}/edit', [EventController::class, 'edit'])->name('users.edit');
    Route::patch('/{id}', [EventController::class, 'update'])->name('users.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
