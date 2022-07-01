<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index'])->name('index');
Route::get('create', [EventController::class, 'create'])->name('create');
Route::post('store', [EventController::class, 'store'])->name('store');
Route::get('show/{event:id}', [EventController::class, 'show'])->name('show');
Route::get('edit/{event:id}', [EventController::class, 'edit'])->name('edit');
Route::put('update/{event:id}', [EventController::class, 'update'])->name('update');
Route::delete('delete/{event:id}', [EventController::class, 'delete'])->name('delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::post('buy/{cart:id}', [EventController::class, 'buy'])->name('buy');
    Route::post('add-cart/{event:id}', [EventController::class, 'addcart'])->name('addcart');
    Route::get('payment', [EventController::class, 'payment'])->name('payment');
    Route::get('my-tickets', [TicketController::class, 'index'])->middleware('auth')->name('ticket.index');
});