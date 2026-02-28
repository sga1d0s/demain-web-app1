<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Demo\Login;
use App\Livewire\Demo\OrdersIndex;
use App\Livewire\Demo\OrderShow;
use App\Livewire\Demo\OrderNew;
use App\Livewire\Demo\Profile;

Route::get('/demo', fn () => redirect()->route('demo.login'));

Route::prefix('demo')
    ->middleware(['web', 'demo'])   // 'web' normalmente ya viene, pero aquí lo dejamos explícito
    ->name('demo.')
    ->group(function () {
        Route::get('/login', Login::class)->name('login');
        Route::get('/orders', OrdersIndex::class)->name('orders');
        Route::get('/orders/new', OrderNew::class)->name('orders.new');
        Route::get('/orders/{code}', OrderShow::class)->name('orders.show');
        Route::get('/profile', Profile::class)->name('profile');
    });