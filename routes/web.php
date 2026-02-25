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
    Route::get('/admin_category', [AdminController::class, 'adminCategory'])->name('admin.category');
    Route::post('/admin_category', [AdminController::class, 'ToAdminCategory'])->name('admin.toaddcategory');
    Route::get('/view_category', [AdminController::class, 'viewCategory'])->name('admin.viewcategory');
    Route::get('/delete_category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deletecategory');
    Route::get('/update_category/{id}', [AdminController::class, 'updateCategory'])->name('admin.updatecategory');
    Route::post('/postupdate_category/{id}', [AdminController::class, 'postUpdateCategory'])->name('admin.postupdatecategory');
    Route::get('/addproduct', [AdminController::class, 'addProduct'])->name('admin.addproduct');
    Route::post('/addproduct', [AdminController::class, 'postAddProduct'])->name('admin.postaddproduct');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
