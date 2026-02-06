<?php

use App\Http\Controllers\Web\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/categorias', App\Livewire\CategoriasMantenimiento::class)->name('categorias');
//Route::get('/estados', App\Livewire\EstadosMantenimiento::class)->name('estados');
//Route::get('/metodos-pago', App\Livewire\MetodosPagoMantenimiento::class)->name('metodos-pago');

/*
Route::get('/ProductossMantenimiento', [ProductoController::class, 'index'])->name('producto');
Route::get('/ProductossMantenimiento', [ProductoController::class, 'index'])->name('producto');
Route::get('/ProductossMantenimiento', [ProductoController::class, 'index'])->name('producto');
Route::get('/ProductossMantenimiento', [ProductoController::class, 'index'])->name('producto');
Route::get('/ProductossMantenimiento', [ProductoController::class, 'index'])->name('producto');

comando para crear un componente
php artisan make:livewire Mantenimiento/
php artisan make:model Categoria
*/
