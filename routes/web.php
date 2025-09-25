<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SettlementController;
use App\Http\Controllers\PaymentLinkController;
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions/store', [TransactionController::class, 'store'])->name('transactions.store');

    // Settlements
    Route::get('/settlements', [SettlementController::class, 'index'])->name('settlements.index');
    Route::get('/settlements/create', [SettlementController::class, 'create'])->name('settlements.create');
    Route::post('/settlements/store', [SettlementController::class, 'store'])->name('settlements.store');

    // Payment Links
    Route::get('/payment-links', [PaymentLinkController::class, 'index'])->name('payment_links.index');
    Route::get('/payment-links/create', [PaymentLinkController::class, 'create'])->name('payment_links.create');
    Route::post('/payment-links/store', [PaymentLinkController::class, 'store'])->name('payment_links.store');
});

