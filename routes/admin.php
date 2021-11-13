<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    CategoryController, DashboardController,
    OrderController,
    PermissionController, PostCategoryController,
    PostController, ProductController,
    RoleController, TagController,
    UserController, SettingController,
    TestimonialController
};

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Permissions
Route::delete('permissions/massDestroy', [PermissionController::class, 'massDestroy']);
Route::resource('permissions', PermissionController::class);

//Roles
Route::delete('roles/massDestroy', [RoleController::class, 'massDestroy']);
Route::resource('roles', RoleController::class);

//Users 
Route::get('users/password', [UserController::class, 'password'])->name('users.password');
Route::patch('users/password', [UserController::class, 'change'])->name('users.password');
Route::delete('users/massDestroy', [UserController::class, 'massDestroy']);
Route::resource('users', UserController::class);

//Categories
Route::delete('categories/massDestroy', [CategoryController::class, 'massDestroy']);
Route::resource('categories', CategoryController::class);

//Products
Route::delete('products/massDestroy', [ProductController::class , 'massDestroy']);
Route::resource('products', ProductController::class);

//Products with Trash
Route::get('products/trash/list', [ProductController::class, 'trash'])->name('products.trash');
Route::post('products/{product}/restore', [ProductController::class, 'restore'])->name('products.restore');
Route::delete('products/{product}/forceDelete', [ProductController::class, 'forceDelete'])->name('products.forceDelete');

//Orders
Route::post('orders/sorting', [OrderController::class, 'sorting']);
Route::get('orders/contract/{order}', [OrderController::class, 'contract'])->name('orders.contract');
Route::get('orders/province/{id}', [OrderController::class, 'province'])->name('orders.sortByProvince');
Route::get('orders/district/{id}', [OrderController::class, 'district'])->name('orders.sortByDistrict');
Route::get('orders/search', [OrderController::class, 'search'])->name('orders.search');
Route::patch('orders/confirm/{order}', [OrderController::class, 'confirm'])->name('orders.confirm');
Route::patch('orders/item/{orderItem}', [OrderController::class, 'updateItem'])->name('orders.item.update');
Route::resource('orders', OrderController::class)->except(['store', 'create']);

//Receipt
Route::post('receipts/debt/{receipt}', [OrderController::class, 'debt'])->name('receipt.debt');

//Post Categories
Route::delete('post_categories/massDestroy', [PostCategoryController::class, 'massDestroy']);
Route::resource('post_categories', PostCategoryController::class);

//Tags
Route::delete('tags/massDestroy', [TagController::class, 'massDestroy']);
Route::resource('tags', TagController::class);

//Posts
Route::delete('posts/massDestroy', [PostController::class, 'massDestroy']);
Route::resource('posts', PostController::class);

//Posts status
Route::patch('posts/{post}/hideStatus', [PostController::class, 'hideStatus'])->name('posts.hideStatus');
Route::patch('posts/{post}/showStatus', [PostController::class, 'showStatus'])->name('posts.showStatus');

//Posts with Trash
Route::get('posts/trash/list', [PostController::class, 'trash'])->name('posts.trash');
Route::post('posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('posts/{post}/forceDelete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');

//Setting site
Route::resource('settings', SettingController::class)->only(['index', 'store']);

//Testimonials 
Route::delete('testimonials/massDestroy', [TestimonialController::class, 'massDestroy']);
Route::resource('testimonials', TestimonialController::class);