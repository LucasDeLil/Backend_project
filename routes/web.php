<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FAQController;

Route::get('/', [HomeController::class, 'home']);
Route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
//All Home and user Routes
route::get('product_details/{id}', [ProductController::class, 'product_details']);
route::get('shop', [ProductController::class, 'shop']);
route::get('why_us', [HomeCOntroller::class, 'why_us']);
route::get('other_users', [UserController::class, 'other_users']);
route::get('all_users', [UserController::class, 'all_users']);
route::get('user_detail/{id}', [UserController::class, 'user_detail']);

route::get('contact_us', [ContactController::class, 'contact_us'])->middleware(['auth', 'verified']);
route::post('add_contact_message', [ContactController::class, 'add_contact_message'])->middleware(['auth', 'verified']);

//Cart/Inventory Related Users
route::get('add_cart/{id}', [CartController::class, 'add_cart'])->middleware(['auth', 'verified']);
route::get('mycart', [CartController::class, 'mycart'])->middleware(['auth', 'verified']);
route::get('remove_cart/{id}', [CartController::class, 'remove_cart'])->middleware(['auth', 'verified']);
route::get('view_inventory', [CartController::class, 'view_inventory'])->middleware(['auth', 'verified']);
Route::post('purchase', [CartController::class, 'purchase'])->middleware(['auth', 'verified']);

//FAQ user
Route::get('/faq', [App\Http\Controllers\FAQController::class, 'faqView'])->name('faq.faq');

//FAQ Admin
Route::get('/faq_edit', [FAQController::class, 'editFaqView'])->name('faq.edit_faq');
Route::delete('/delete_category/{id}', [FAQController::class, 'deleteFAQCategory'])->name('delete_category')->middleware(['auth', 'admin']);;
Route::post('/add_FAQ_category', [FAQController::class, 'addFAQCategory'])->name('add_FAQ_category')->middleware(['auth', 'admin']);;
Route::put('/faq/edit_item/{id}', [FAQController::class, 'updateFaqItem'])->name('update_faq_item')->middleware(['auth', 'admin']);;
Route::delete('/faq/delete/{id}', [FAQController::class, 'deleteFaqItem'])->name('delete_faq_item')->middleware(['auth', 'admin']);;
Route::post('/faq/add-item/{category_id}', [FAQController::class, 'addFaqItem'])->name('add_faq_item')->middleware(['auth', 'admin']);;
Route::put('/faq/edit_category/{id}', [FAQController::class, 'updateFaqCategory'])->name('update_faq_category')->middleware(['auth', 'admin']);;
Route::get('/faq', [FAQController::class, 'faqView'])->name('faq.faq');

//All admin routes
route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin']);
//Admin Category related
route::get('view_category', [ProductController::class, 'view_category'])->middleware(['auth', 'admin']);
route::post('add_category', [ProductController::class, 'add_category'])->middleware(['auth', 'admin']);
route::get('delete_category/{id}', [ProductController::class, 'delete_category'])->middleware(['auth', 'admin']);
route::get('edit_category/{id}', [ProductController::class, 'edit_category'])->middleware(['auth', 'admin']);
route::post('update_category/{id}', [ProductController::class, 'update_category'])->middleware(['auth', 'admin']);

//Admin Product related
route::get('add_product', [ProductController::class, 'add_product'])->middleware(['auth', 'admin']);
route::post('upload_product', [ProductController::class, 'upload_product'])->middleware(['auth', 'admin']);
route::get('view_product', [ProductController::class, 'view_product'])->middleware(['auth', 'admin']);
route::get('delete_product/{id}', [ProductController::class, 'delete_product'])->middleware(['auth', 'admin']);
route::get('update_product/{id}', [ProductController::class, 'update_product'])->middleware(['auth', 'admin']);
route::post('edit_product/{id}', [ProductController::class, 'edit_product'])->middleware(['auth', 'admin']);
route::get('product_search', [ProductController::class, 'product_search'])->middleware(['auth', 'admin']);

//Admin User related
route::get('view_user', [UserController::class, 'view_user'])->middleware(['auth', 'admin']);
route::get('update_user/{id}', [UserController::class, 'update_user'])->middleware(['auth', 'admin']);
route::post('edit_user/{id}', [UserController::class, 'edit_user'])->middleware(['auth', 'admin']);

//Admin Contact related
route::get('view_contact', [ContactController::class, 'view_contact'])->middleware(['auth', 'admin']);
route::get('update_contact/{id}', [ContactController::class, 'update_contact'])->middleware(['auth', 'admin']);
route::post('edit_contact/{id}', [ContactController::class, 'edit_contact'])->middleware(['auth', 'admin']);
