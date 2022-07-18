<?php

use App\Http\Controllers\{BuyController, EventController, TicketController, TransactionController};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index'])->name('index');
Route::get('show/{event:id}', [EventController::class, 'show'])->name('show');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::post('add-cart/{event:id}', [BuyController::class, 'addcart'])->name('addcart');
    Route::get('payment', [BuyController::class, 'payment'])->name('payment');
    Route::post('buy/{cart:id}', [BuyController::class, 'buy'])->name('buy');
    Route::get('my-tickets', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('download/{event:id}', [EventController::class, 'download'])->name('download');

    Route::middleware('AdminRole')->group(function () {
        Route::get('create', [EventController::class, 'create'])->name('create');
        Route::post('store', [EventController::class, 'store'])->name('store');
        Route::get('edit/{event:id}', [EventController::class, 'edit'])->name('edit');
        Route::put('update/{event:id}', [EventController::class, 'update'])->name('update');
        Route::delete('delete/{event:id}', [EventController::class, 'delete'])->name('delete');

        Route::get('transaction', TransactionController::class)->name('transaction');
    });
});
