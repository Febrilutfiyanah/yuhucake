<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Tema aktif: theme.sweetcake
|--------------------------------------------------------------------------
*/

// Halaman utama dan publik
Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('products', [HomepageController::class, 'products'])->name('products'); // ✅ tambahkan nama
Route::get('product/{slug}', [HomepageController::class, 'product'])->name('product.show');
Route::get('categories', [HomepageController::class, 'categories'])->name('categories'); // ✅ tambahkan nama
Route::get('category/{slug}', [HomepageController::class, 'category'])->name('category.show'); // ✅ tambahkan nama (optional)

// Keranjang dan Checkout
Route::get('cart', [HomepageController::class, 'cart'])->name('cart.index');
Route::get('checkout', [HomepageController::class, 'checkout'])->name('checkout.index');

// Fitur Cart hanya untuk user customer yang login
Route::group(['middleware' => ['is_customer_login']], function () {
    Route::controller(CartController::class)->group(function () {
        Route::post('cart/add', 'add')->name('cart.add');
        Route::delete('cart/remove/{id}', 'remove')->name('cart.remove');
        Route::patch('cart/update/{id}', 'update')->name('cart.update');
    });
});

// Autentikasi Customer (Login, Register, Logout)
Route::group(['prefix' => 'customer'], function () {
    Route::controller(CustomerAuthController::class)->group(function () {
        Route::group(['middleware' => 'check_customer_login'], function () {
            Route::get('login', 'login')->name('customer.login');
            Route::post('login', 'store_login')->name('customer.store_login');
            Route::get('register', 'register')->name('customer.register');
            Route::post('register', 'store_register')->name('customer.store_register');
        });

        Route::post('logout', 'logout')->name('customer.logout');
    });
});

// Dashboard Admin (dengan auth dan verifikasi email)
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', ProductCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('themes', ThemeController::class);
    Route::post('products/sync/{id}', [ProductController::class, 'sync'])->name('products.sync');
    Route::post('category/sync/{id}', [ProductCategoryController::class, 'sync'])->name('category.sync');

    // Aktivasi tema berdasarkan ID
    Route::put('themes/{id}/activate', [ThemeController::class, 'activate'])->name('themes.activate');

    // (Opsional) Aktivasi tema berdasarkan slug
    Route::put('themes/activate/{slug}', [ThemeController::class, 'activateBySlug'])->name('themes.activateBySlug');
});

// Pengaturan user dengan Livewire Volt
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Route tambahan dari Laravel Breeze / Fortify
require __DIR__ . '/auth.php';
