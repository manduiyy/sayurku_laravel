<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogManagement;
use App\Http\Controllers\BlogManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductManagementController;
use App\Http\Controllers\NavigationController;

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/our-products', [PageController::class, 'products']);
Route::get('/blogs', [PageController::class, 'blogs']);
Route::get('/order-our-product', [PageController::class, 'order']);

Route::post('submit-order', [OrderController::class, 'submitOrder']);

//Authentification or User Login

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('CheckAuth');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Dashboard Page
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/order/detail/{order_id}', [OrderController::class, 'show']);

//Product
Route::get('/product-management', [ProductManagementController::class, 'index'])->middleware('CheckAuth');
Route::get('/product-management/create', [ProductManagementController::class, 'create'])->middleware('CheckAuth');
Route::post('/product-management/store', [ProductManagementController::class, 'store']);
Route::get('/product-management/edit/{id}', [ProductManagementController::class, 'edit'])->middleware('CheckAuth');
Route::post('/product-management/update', [ProductManagementController::class, 'update']);
Route::get('/product-management/delete/{id}', [ProductManagementController::class, 'destroy']);

//Navigation Management
Route::get('/navigation-management', [NavigationController::class, 'index'])->middleware('CheckAuth');
Route::get('/navigation-management/create', [NavigationController::class, 'create'])->middleware('CheckAuth');
Route::post('/navigation-management/store', [NavigationController::class, 'store']);
Route::get('/navigation-management/edit/{id}', [NavigationController::class, 'edit'])->middleware('CheckAuth');
Route::post('/navigation-management/update', [NavigationController::class, 'update']);
Route::get('/navigation-management/delete/{id}', [NavigationController::class, 'destroy']);

//Blog Management
Route::get('/blog-management', [BlogManagementController::class, 'index'])->middleware('CheckAuth');
Route::get('/blog-management/create', [BlogManagementController::class, 'create'])->middleware('CheckAuth');
Route::post('/blog-management/store', [BlogManagementController::class, 'store']);
Route::get('/blog-management/edit/{id}', [BlogManagementController::class, 'edit'])->middleware('CheckAuth');
Route::post('/blog-management/update', [BlogManagementController::class, 'update']);
Route::get('/blog-management/delete/{id}', [BlogManagementController::class, 'destroy']);