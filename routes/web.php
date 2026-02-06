<?php

use App\Http\Controllers\Web\ProductoController;
use App\Http\Controllers\Web\ProductoVerController;
use Illuminate\Support\Facades\Route;

//parte pública
//Route::get('/', [ProductoController::class, 'crearTicket'])->name('public.ticket');
Route::get('/ProductossMantenimiento', [ProductoController::class, 'index'])->name('producto');
Route::get('/', [ProductoVerController::class, 'index'])->name('productover');
Route::post('/logout', [ProductoController::class, 'index'])->name('logout');

