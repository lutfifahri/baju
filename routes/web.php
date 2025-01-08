<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('login', \App\Livewire\Auth\Login::class)->name('auth.login');
    });
});

Route::middleware(['auth'])->group(function () {
    # dashboard & logout
    Route::get('/', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/logout', \App\Livewire\Auth\Logout::class)->name('auth.logout');
    # Categories
    Route::get('/categories', \App\Livewire\Categories\Index::class)->name('categories.index');
    Route::get('/categories/create', \App\Livewire\Categories\Create::class)->name('categories.create');
    Route::get('categories/{categories}', \App\Livewire\Categories\Edit::class)->name('categories.edit');
    # products
    Route::get('/products', \App\Livewire\Products\Index::class)->name('products.index');
    Route::get('/products/create', \App\Livewire\Products\Create::class)->name('products.create');
    Route::get('/products/{products}', \App\Livewire\Products\Edit::class)->name('products.edit');
    # Orders
    Route::get('/orders', \App\Livewire\Orders\Index::class)->name('orders.index');
    Route::get('/orders/create', \App\Livewire\Orders\Create::class)->name('orders.create');
    # Laporan
    Route::get('/laporan', \App\Livewire\Laporan\Index::class)->name('laporan.index');
});
