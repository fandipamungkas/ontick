<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index'])->name('index');

Auth::routes();
Route::get('show/{event:id}', [EventController::class, 'show'])->name('show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function() {
    Route::post('add-cart/{event:id}', [EventController::class, 'addcart'])->name('addcart');
    Route::get('payment', [EventController::class, 'payment'])->name('payment');
    Route::post('buy/{cart:id}', [EventController::class, 'buy'])->name('buy');
    Route::get('my-tickets', [TicketController::class, 'index'])->name('ticket.index');

    // Route::middleware('CheckRole')->group(function() {
    //     Route::get('create', [EventController::class, 'create'])->name('create');
    //     Route::post('store', [EventController::class, 'store'])->name('store');
    //     Route::get('edit/{event:id}', [EventController::class, 'edit'])->name('edit');
    //     Route::put('update/{event:id}', [EventController::class, 'update'])->name('update');
    //     Route::delete('delete/{event:id}', [EventController::class, 'delete'])->name('delete');
    // });

});
