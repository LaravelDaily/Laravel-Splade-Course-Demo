<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['splade'])->group(function () {
    Route::get('/', fn () => view('home'))->name('home');
    Route::get('/docs', fn () => view('docs'))->name('docs');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('users/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('users.show');

    Route::resource('projects', \App\Http\Controllers\ProjectController::class);

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
});
