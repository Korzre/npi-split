<?php

use App\Http\Controllers\ProdutoConsumidoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SessaoController;
use App\Models\Produto;
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
Route::get('/compras/menu', [ProdutoController::class, 'menu']);
Route::get('/compras/compra', [ProdutoController::class, 'compra']);

Route::resource('compras', ProdutoController::class);
Route::resource('consumo', ProdutoConsumidoController::class);

Route::get('sessao', [SessaoController::class, 'sessao']);
Route::get('/consumo/{id}/add', [ProdutoConsumidoController::class, 'add'])->name('consumo.add');

Route::post('/consumo/{id}/add', [ProdutoConsumidoController::class, 'store'])->name('consumo.store');

Route::get('/', function () {
    return view('welcome');
});
