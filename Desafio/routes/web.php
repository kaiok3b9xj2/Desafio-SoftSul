<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\Api\PedidoApiController;

Route::get('/', [PedidoController::class, 'index'])->name('pedidos.index');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
Route::put('/pedidos/{id}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
Route::put('/pedidos/{id}', [PedidoController::class, 'update'])->name('pedidos.update');
Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');


Route::get('/api/pedidos', [PedidoApiController::class, 'index']);

