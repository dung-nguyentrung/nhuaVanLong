<?php

use App\Http\Controllers\Frontend\{
    BlogController,
    CartController,
    ContactController,
    HomeController,
    PolicyController,
    ProductController
};
use Illuminate\Support\Facades\Auth;
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

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

//About 
Route::get('about-us', [HomeController::class, 'about'])->name('about-us');

//Products
Route::get('shop', [ProductController::class, 'index'])->name('shop');
Route::get('shop/search', [ProductController::class, 'search'])->name('products.search');
Route::get('products/detail/{product:slug}', [ProductController::class, 'detail'])->name('products.detail');
Route::get('products/category/{category:slug}', [ProductController::class, 'category'])->name('products.category');

//Cart
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('wishlist', [CartController::class, 'wishlist'])->name('wishlist');
Route::post('wishlist', [CartController::class, 'addToWishlist'])->name('wishlist');
Route::post('product/add-to-cart', [CartController::class, 'addToCart'])->name('products.cart');
Route::post('product/ajax-add-to-cart', [CartController::class, 'addToCartAjax'])->name('products.ajax.cart');
Route::post('cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('cart/destroy', [CartController::class, 'destroyCart'])->name('cart.destroy');

//Checkout
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');


//
Route::get('purchase-policy', [PolicyController::class, 'purchase'])->name('policy.purchase');

//Blogs
Route::get('blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('blogs/search', [BlogController::class, 'search'])->name('posts.search');
Route::get('blogs/category/{postCategory:slug}', [BlogController::class, 'category'])->name('posts.category');
Route::get('blogs/{post:slug}', [BlogController::class, 'detail'])->name('posts.detail');
Route::get('blogs/tag/{tag:slug}', [BlogController::class, 'tag'])->name('posts.tag');

//Contact
Route::get('contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('contact-us', [ContactController::class, 'store'])->name('contact');

//Languagues
Route::get('languages/{language}', [HomeController::class, 'language'])->name('language');

//Authentication with non register
Auth::routes();