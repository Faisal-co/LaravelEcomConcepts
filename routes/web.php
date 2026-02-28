<?php
// middleware means before route to any page check some Authentication then go to that page.
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', [UserController::class, 'homeIndex'])->name('index');
Route::get('/product_details/{id}', [UserController::class, 'productDetails'])->name('productdetails');
Route::get('/viewallproducts', [UserController::class, 'viewAllProducts'])->name('viewallproducts');

// One Route for two file views with Same names  dashboard.blade.php(dashboard and admin.dashboard)
Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/addtocart/{id}', [UserController::class, 'addToCart'])->middleware(['auth', 'verified'])->name('add_to_cart');
Route::get('/cartproducts', [UserController::class, 'cartProducts'])->middleware(['auth', 'verified'])->name('cartproducts');
Route::get('/removecart/{id}', [UserController::class, 'removeCart'])->middleware(['auth', 'verified'])->name('removecart');
Route::post('/confirm_order', [UserController::class, 'confirmOrder'])->middleware(['auth', 'verified'])->name('confirm_order');

Route::middleware('admin')->group(function(){
    Route::get('/admin_category', [AdminController::class, 'adminCategory'])->name('admin.category');
    Route::post('/admin_category', [AdminController::class, 'ToAdminCategory'])->name('admin.toaddcategory');
    Route::get('/view_category', [AdminController::class, 'viewCategory'])->name('admin.viewcategory');
    Route::get('/delete_category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deletecategory');
    Route::get('/update_category/{id}', [AdminController::class, 'updateCategory'])->name('admin.updatecategory');
    Route::post('/postupdate_category/{id}', [AdminController::class, 'postUpdateCategory'])->name('admin.postupdatecategory');
    Route::get('/addproduct', [AdminController::class, 'addProduct'])->name('admin.addproduct');
    Route::post('/addproduct', [AdminController::class, 'postAddProduct'])->name('admin.postaddproduct');
    Route::get('/view_product', [AdminController::class, 'viewProduct'])->name('admin.viewproduct');
    Route::get('/deleteproduct/{id}', [AdminController::class, 'deleteProduct'])->name('admin.deleteproduct');
    Route::get('/updateproduct/{id}', [AdminController::class, 'updateProduct'])->name('admin.updateproduct');
    Route::post('/updateproduct/{id}', [AdminController::class, 'PostUpdateProduct'])->name('admin.postupdateproduct');
    Route::any('/search', [AdminController::class, 'searchProduct'])->name('admin.searchproduct');
    Route::get('/ordersdisplay', [AdminController::class, 'ordersDisplay'])->name('admin.ordersdisplay');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
