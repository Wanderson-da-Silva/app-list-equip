<?php

use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Autenticador;
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

Route::get('/', function () {
    return view('welcome');
});

//se for usar os nomes padroes - todas as rotas liberadas
//ou acrescentando ->only(['index','create']) para especificar quais rotas serao usadas somente/ou exceto(ver contrario)
//Route::resource('/series', SeriesController::class);

Route::middleware(Autenticador::class)->group(function (){ 

    Route::controller(EquipamentosController::class)->group(function(){

        Route::get('/equipamento', 'index')->name('equipamentos.listar')->middleware(Autenticador::class);
        Route::get('/equipamento/create', 'create')->name('equipamento.criar');
        Route::post('/equipamento/salvar','store')->name('equipamento.salvar');
        Route::get('/equipamento/editar/{equipamento}', 'edit')->name('equipamento.editar');
        
        Route::post('/equipamento/atualizar', 'update')->name('equipamento.atualizar');
        Route::post('/equipamento/destroy/{equipamento}',  'destroy')->name('equipamento.deletar');
    
    });
    
    
    
    Route::controller(FornecedoresController::class)->group(function(){
        //rota /animes vai acessar metodo index no AnimesController
        Route::get('/fornecedor', 'index')->name('fornecedores.listar');
        Route::get('/fornecedor/create', 'create')->name('fornecedor.criar');
        Route::post('/fornecedor/salvar', 'store')->name('fornecedor.salvar');
        Route::get('/fornecedor/editar/{fornecedor}', 'edit')->name('fornecedor.editar');
        Route::post('/fornecedor/atualizar', 'update')->name('fornecedor.atualizar');
        Route::post('/fornecedor/destroy/{fornecedor}',  'destroy')->name('fornecedor.deletar');    
    });
    
    Route::controller(MarcasController::class)->group(function(){
        //rota /animes vai acessar metodo index no AnimesController
        Route::get('/marca', 'index')->name('marcas.listar');
        Route::get('/marca/create', 'create')->name('marca.criar');
        Route::post('/marca/salvar', 'store')->name('marca.salvar');
        Route::get('/marca/editar/{marca}', 'edit')->name('marca.editar');
        Route::post('/marca/atualizar', 'update')->name('marca.atualizar');
        Route::post('/marca/destroy/{marca}',  'destroy')->name('marca.deletar');    
    });

});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login');
    Route::post('/login/logar', 'logar')->name('login.logar');
    Route::get('/login/cadastroindex', 'cadastroindex')->name('login.cadastroindex');
    Route::post('/login/cadastro', 'cadastro')->name('login.cadastro');
    Route::get('/login/dest', 'destroy')->name('login.dest');
});