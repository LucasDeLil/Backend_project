<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home']);
Route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//All user routes
route::get('product_details/{id}', [HomeCOntroller::class, 'product_details']);
route::get('shop', [HomeCOntroller::class, 'shop']);
route::get('contact_us', [HomeCOntroller::class, 'contact_us']);
route::get('why_us', [HomeCOntroller::class, 'why_us']);
route::get('testimonial', [HomeCOntroller::class, 'testimonial']);
route::post('add_contact_message', [HomeCOntroller::class, 'add_contact_message']);

route::get('add_cart/{id}', [HomeCOntroller::class, 'add_cart'])->middleware(['auth', 'verified']);
route::get('mycart', [HomeCOntroller::class, 'mycart'])->middleware(['auth', 'verified']);
route::get('remove_cart/{id}', [HomeCOntroller::class, 'remove_cart'])->middleware(['auth', 'verified']);

//All admin routes
route::get('admin/dashboard', [HomeCOntroller::class, 'index'])->middleware(['auth','admin']);
//Category related
route::get('view_category', [AdminCOntroller::class, 'view_category'])->middleware(['auth','admin']);
route::post('add_category', [AdminCOntroller::class, 'add_category'])->middleware(['auth','admin']);
route::get('delete_category/{id}', [AdminCOntroller::class, 'delete_category'])->middleware(['auth','admin']);
route::get('edit_category/{id}', [AdminCOntroller::class, 'edit_category'])->middleware(['auth','admin']);
route::post('update_category/{id}', [AdminCOntroller::class, 'update_category'])->middleware(['auth','admin']);
//Product related
route::get('add_product', [AdminCOntroller::class, 'add_product'])->middleware(['auth','admin']);
route::post('upload_product', [AdminCOntroller::class, 'upload_product'])->middleware(['auth','admin']);
route::get('view_product', [AdminCOntroller::class, 'view_product'])->middleware(['auth','admin']);
route::get('delete_product/{id}', [AdminCOntroller::class, 'delete_product'])->middleware(['auth','admin']);
route::get('update_product/{id}', [AdminCOntroller::class, 'update_product'])->middleware(['auth','admin']);
route::post('edit_product/{id}', [AdminCOntroller::class, 'edit_product'])->middleware(['auth','admin']);
route::get('product_search', [AdminCOntroller::class, 'product_search'])->middleware(['auth','admin']);