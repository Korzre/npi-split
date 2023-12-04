<?php

use App\Http\Controllers\DividasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoConsumidoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RateioController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\SessaoController;
use App\Models\Produto;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('/menu', [ProdutoController::class, 'menu']);
Route::get('/compras/compra', [ProdutoController::class, 'compra']);

Route::resource('compras', ProdutoController::class);
Route::resource('consumo', ProdutoConsumidoController::class);
Route::resource('rateio', RateioController::class);
Route::resource('dividas', DividasController::class);
Route::resource('relatorios', RelatorioController::class);
Route::resource('login', LoginController::class)->except(['show']);

Route::post('/atualizar-pagamento', [DividasController::class, 'atualizarPagamento'])->name('atualizarPagamento');

#Route::post('/relatorio/pdf-prod', 'RelatorioController@gerarRelatorioPDF_produtos');

#Route::match(['get', 'post'], '/relatorio/pdf-prod', 'RelatorioController@gerarRelatorioPDF_produtos');
Route::get('/relatorio/pdf-prod', [RelatorioController::class, 'gerarRelatorioPDF_produtos']);
#Route::get('/relatorio/pdf-usu', [RelatorioController::class, 'gerarRelatorioPDF_usuario']);
Route::get('/relatorio/pdf-usu/{usuario}', [RelatorioController::class, 'gerarRelatorioPDF_usuario']);
#Route::get('login/cadastro', [LoginController::class, 'cadastro']);

Route::get('/relatorio/pdf-rat/{usuario}', [RelatorioController::class, 'gerarRelatorioPDF_rateio']);
Route::get('/relatorio/pdf-div/{usuario}', [RelatorioController::class, 'gerarRelatorioPDF_dividas']);


Route::get('/auth/redirect', [LoginController::class, 'redirectToGoogle'])->name('google-redirect');

Route::get('login/cadastro', [LoginController::class, 'cadastro'])->name('cadastro-usuario');

Route::get('/auth/callback-google', [LoginController::class, 'handleGoogleCallback'])->name('google');

Route::get('/callback-google', [LoginController::class, 'handleGoogleCallback'])->name('google.callback');

#Route::get('login/cadastro', [LoginController::class, 'cadastro'])->name('cadastro-usuario');


Route::get('sessao', [SessaoController::class, 'sessao']);
Route::get('/consumo/{id}/add', [ProdutoConsumidoController::class, 'add'])->name('consumo.add');

Route::post('/consumo/{id}/add', [ProdutoConsumidoController::class, 'store'])->name('consumo.store');


Route::get('/', function () {
    return view('welcome');
});
