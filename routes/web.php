<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//All admin routes
route::get('admin/dashboard', [HomeCOntroller::class, 'index'])->middleware(['auth','admin']);
route::get('view_category', [AdminCOntroller::class, 'view_category'])->middleware(['auth','admin']);
route::post('add_category', [AdminCOntroller::class, 'add_category'])->middleware(['auth','admin']);
route::get('delete_category/{id}', [AdminCOntroller::class, 'delete_category'])->middleware(['auth','admin']);
route::get('edit_category/{id}', [AdminCOntroller::class, 'edit_category'])->middleware(['auth','admin']);
route::post('update_category/{id}', [AdminCOntroller::class, 'update_category'])->middleware(['auth','admin']);
route::get('add_product', [AdminCOntroller::class, 'add_product'])->middleware(['auth','admin']);
route::post('upload_product', [AdminCOntroller::class, 'upload_product'])->middleware(['auth','admin']);
route::get('view_product', [AdminCOntroller::class, 'view_product'])->middleware(['auth','admin']);
route::get('delete_product/{id}', [AdminCOntroller::class, 'delete_product'])->middleware(['auth','admin']);
route::get('update_product/{id}', [AdminCOntroller::class, 'update_product'])->middleware(['auth','admin']);
route::post('edit_product/{id}', [AdminCOntroller::class, 'edit_product'])->middleware(['auth','admin']);