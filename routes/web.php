<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
    return view("welcome");
});

Route::prefix('vendas')->group(function () {
    Route::get('/', [VendaController::class, 'index'])->name('vendas.index');
    Route::get('/nova', [VendaController::class, 'create'])->name('vendas.create');
    Route::get('/edit/{venda}', [VendaController::class, 'edit'])->name('vendas.edit');
    Route::get('/pdf/{venda}', [VendaController::class, 'show'])->name('vendas.show');
    Route::get('/filtro', [VendaController::class, 'search'])->name('vendas.search');
    Route::put('/{venda}', [VendaController::class, 'update'])->name('vendas.update');
    Route::post('/nova', [VendaController::class, 'store'])->name('vendas.store');
    Route::delete('/delete/{venda}', [VendaController::class, 'destroy'])->name('vendas.destroy');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/novo', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::get('/{id}', [ProdutoController::class, 'show'])->name('produtos.show');
    Route::get('/edit/{produto}', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::post('/novo', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::delete('/delete/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
});

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/novo', [ClienteController::class, 'create'])->name('clientes.create');
    Route::get('/edit/{cliente}', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::post('/novo', [ClienteController::class, 'store'])->name('clientes.store');
    Route::delete('/delete/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
});