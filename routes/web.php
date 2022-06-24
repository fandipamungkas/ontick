<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index']);
Route::get('create', [EventController::class, 'create'])->name('create');
Route::post('store', [EventController::class,'store'])->name('store');
Route::delete('delete/{event:id}', [EventController::class,'delete'])->name('delete');
Route::get('edit/{event:id}', [EventController::class,'edit'])->name('edit');
Route::put('update/{event:id}', [EventController::class,'update'])->name('update');
