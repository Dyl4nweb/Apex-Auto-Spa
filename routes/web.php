<?php

use App\Http\Controllers\CarWashController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarWashController::class, 'index'])->name('home');
Route::post('/book', [CarWashController::class, 'bookAppointment'])->name('book.appointment');
