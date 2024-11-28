<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\RegistrationController;


Route::get('/', function () {
    return view('welcome');
});

// Rute untuk login, register, dan logout
Auth::routes();
Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
// Rute yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    // Rute untuk halaman Home (tampilan untuk pengguna yang login)
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rute untuk event dan konten hanya untuk admin
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::resource('/events', EventController::class);
        Route::resource('/contents', ContentController::class);
        Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
        Route::get('/registrations/{id}/edit', [RegistrationController::class, 'edit'])->name('registrations.edit');
        Route::put('/registrations/{id}', [RegistrationController::class, 'update'])->name('registrations.update');
        Route::delete('/registrations/{id}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');
    });

});