<?php
// middleware means before route to any page check some Authentication then go to that page.
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('homeindex');
    })->name('homeindex');

// One Route for two file views with Same names  dashboard.blade.php(dashboard and admin.dashboard)
Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('admin')->group(function(){
    Route::get('/admintest', [AdminController::class, 'admintest'])->name('admintest');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
