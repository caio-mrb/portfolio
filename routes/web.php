<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

Route::post('/toggle-dark-mode', function () {
    $darkMode = request('dark_mode');
    Session::put('darkMode', $darkMode);
    return response()->json(['success' => true]);
});
