<?php

use App\Http\Controllers\ContaController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Controllers\TarefasController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('home');
// });


//contas
Route::prefix('contas')->group(function () {
   
    Route::get('', [ContaController::class, 'index'])->name('listarContas');
    Route::get('/create', [ContaController::class, 'create'])->name('cadastroConta');
    Route::get('/{id}', [ContaController::class, 'edit'])->name('editarConta');
    Route::post('/insert', [ContaController::class, 'store'])->name('insertConta');
    Route::put('/update/{id}', [ContaController::class, 'update'])->name('updateConta');
    Route::delete('/removeTodasParcelas/{id}', [ContaController::class, 'removeTodasParcelas'])->name('removerParcelasConta');

});

//parcelas
Route::prefix('parcelas')->group(function () {
   
    Route::get('', [ParcelaController::class, 'index'])->name('listarParcelas');
    Route::get('/create/{tipo}', [ParcelaController::class, 'create'])->name('cadastroParcela');
    Route::post('/cadastrar', [ParcelaController::class, 'store'])->name('insertParcela');
    Route::get('/{mes}', [ParcelaController::class, 'meselecionado'])->name('parcelasMes');
    Route::get('/tipoCadastro/{tipo}', [ParcelaController::class, 'getCadastroParcelaByTipo']);
    Route::get('/pagarParcela/{id}', [ParcelaController::class, 'pagarParcela']);
    Route::delete('/delete/{id}', [ParcelaController::class, 'remove'])->name('removeParcela');

});

//pets
Route::prefix('pets')->group(function () {
   
    Route::get('', [PetController::class, 'index'])->name('listarPets');
    Route::get('/create', [PetController::class, 'create'])->name('cadastroPet');
    Route::post('/cadastrar', [PetController::class, 'store'])->name('insertPet');
    Route::get('/{id}', [PetController::class, 'edit'])->name('editarPet');
    Route::delete('/{id}', [PetController::class, 'destroy'])->name('removePet');
    Route::put('/update/{id}', [PetController::class, 'update'])->name('atualizaPet');

});

Route::prefix('tarefas')->group(function() {
    Route::get('', [TarefasController::class, 'index'])->name('listarTarefas');
    Route::get('/create', [TarefasController::class, 'create'])->name('cadastroTarefa');
    Route::post('/cadastrar', [TarefasController::class, 'store'])->name('insertTarefa');
    Route::get('/{id}', [TarefasController::class, 'edit'])->name('editarTarefa');
    Route::delete('/{id}', [TarefasController::class, 'destroy'])->name('removeTarefa');
    Route::put('/update/{id}', [TarefasController::class, 'update'])->name('updateTarefa');
});


//procedimentos
Route::get('/procedimentos/create/{id_pet?}', [ProcedimentoController::class, 'create']);
Route::get('/procedimentos', [ProcedimentoController::class, 'index']);
Route::get('/procedimentos/edit/{id}', [ProcedimentoController::class, 'edit']);
Route::post('/procedimentos/insert', [ProcedimentoController::class, 'store']);
Route::post('/procedimentos/update/{id}', [ProcedimentoController::class, 'update']);
Route::post('/marcarRealizado/{id}', [ProcedimentoController::class, 'marcarRealizado']);
Route::post('/desmarcarRealizado/{id}', [ProcedimentoController::class, 'desmarcarRealizado']);
Route::delete('/procedimentos/{id}', [ProcedimentoController::class, 'destroy']);

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
