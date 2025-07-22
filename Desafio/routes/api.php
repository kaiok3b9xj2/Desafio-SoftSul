<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PedidoApiController;

Route::get('/', [PedidoApiController::class, 'index'])->name('pedidos.index');
