<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Product\Create;
use App\Livewire\Admin\Product\CreateCategory;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/admin/products', function () {
    return view('admin.products');
})->name('admin.products');

Route::get('/admin/product/create', Create::class)
    ->name('admin.product.create');

Route::get('/admin/product/create-category', CreateCategory::class)
    ->name('admin.product.create-category');

require __DIR__ . '/auth.php';
