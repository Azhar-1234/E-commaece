<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontEnd\SiteController;
use App\Http\Controllers\FrontEnd\cartController;
use App\Http\Controllers\BackEnd\DashboardController;
use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\BackEnd\SubCategoryController;
use App\Http\Controllers\BackEnd\ProductController;
use App\Http\Controllers\BackEnd\headerController;
use App\Http\Controllers\BackEnd\sliderController;

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
Route::get('/',[SiteController::class,'home'])->name('/');
Route::get('sub-category/{slug}',[SiteController::class,'subCategory'])->name('sub-category');
Route::get('product-detail/{slug}',[SiteController::class,'productDetail'])->name('product-detail');
Route::post('stripe-payment',[SiteController::class,'handlePost'])->name('stripe.payment');
//before login
Route::get('user-login',[SiteController::class,'userLogin'])->name('user-login')->middleware('CheckAuth');
Route::post('user-login',[SiteController::class,'userLoginSubmit'])->name('user-login')->middleware('CheckAuth');
//after login
Route::middleware(['Customer'])->group(function(){
Route::get('order-list',[SiteController::class,'orderList'])->name('order-list');
Route::get('user-logout',[SiteController::class,'userLogout'])->name('user-logout');
});
Auth::routes();
Route::get('/home', [DashboardController::class, 'dashboard'])->name('home');
//start slider
Route::get('add-slider', [sliderController::class, 'addSlider'])->name('add-slider');
Route::post('image-gallery', [sliderController::class, 'upload'])->name('image-gallery');
Route::get('manage-slider', [sliderController::class, 'manageSlider'])->name('manage-slider');
Route::post('delete-gallery/{id}',[sliderController::class, 'destroy'])->name('delete-gallery');
//start Header
Route::get('add-header', [headerController::class, 'addHeader'])->name('add-header');
Route::post('store-header',[headerController::class, 'storeHeader'])->name('store-header');
Route::get('manage-header',[headerController::class, 'manageHeader'])->name('manage-header');
Route::get('edit-header/{id}',[headerController::class, 'editHeader'])->name('edit-header');
Route::post('update-header',[headerController::class, 'updateHeader'])->name('update-header');

//start cart
Route::post('add-to-cart',[cartController::class,'addToCart'])->name('add-to-cart');
Route::get('show-cart',[cartController::class,'showCart'])->name('show-cart');
Route::get('check-quantity',[cartController::class,'checkQuantity'])->name('check-quantity');
Route::get('delete-cart-product',[cartController::class,'deleteProduct'])->name('delete-cart-product');
Route::get('checkout',[cartController::class,'checkout'])->name('checkout');
//start Category
Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
Route::post('/store-category', [CategoryController::class, 'storeCategory'])->name('store-category');
Route::get('/manage-category', [CategoryController::class, 'manageCategory'])->name('manage-category');
Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit-category');
Route::post('update-category', [CategoryController::class, 'updateCategory'])->name('update-category');
Route::get('delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');
//end category
Route::get('/add-sub-category', [SubCategoryController::class, 'add'])->name('add-sub-category');
Route::post('sub-store-category', [SubCategoryController::class, 'store'])->name('sub-store-category');
Route::get('/sub-manage-category', [SubCategoryController::class, 'manage'])->name('sub-manage-category');
Route::get('/sub-edit-category/{id}', [SubCategoryController::class, 'edit'])->name('sub-edit-category');
Route::post('sub-update-category', [SubCategoryController::class, 'update'])->name('sub-update-category');
Route::get('sub-delete-category/{id}', [SubCategoryController::class, 'delete'])->name('sub-delete-category');
//end subcategory
//start product
Route::get('add-product', [ProductController::class, 'addProduct'])->name('add-product');
Route::get('/manage-product', [ProductController::class, 'manageProduct'])->name('manage-product');
Route::post('/store-product', [ProductController::class, 'storeProduct'])->name('store-product');
Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
Route::post('update-product', [ProductController::class, 'updateProduct'])->name('update-product');
Route::get('delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');


