<?php

use App\Http\Controllers\ContaController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProcedimentoController;
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
Route::get('/contas', [ContaController::class, 'index']);
Route::get('/contas/create', [ContaController::class, 'create']);
Route::post('/contas/cadastrar', [ContaController::class, 'store']);

//parcelas
Route::get('/parcelas', [ParcelaController::class, 'index']);
Route::get('/parcelas/create/{tipo}', [ParcelaController::class, 'create']);
Route::post('/parcelas/cadastrar', [ParcelaController::class, 'store']);
Route::get('/parcelas/{mes}', [ParcelaController::class, 'meselecionado'])->name('parcelasMes');
Route::get('/tipoCadastro/{tipo}', [ParcelaController::class, 'getCadastroParcelaByTipo']);
Route::get('/pagarParcela/{id}', [ParcelaController::class, 'pagarParcela']);

//pets
Route::prefix('pets')->group(function () {
   
    Route::get('', [PetController::class, 'index'])->name('listarPets');
    Route::get('/create', [PetController::class, 'create'])->name('cadastroPet');
    Route::post('/cadastrar', [PetController::class, 'store'])->name('insertPet');
    Route::get('/{id}', [PetController::class, 'edit'])->name('editarPet');
    Route::delete('/{id}', [PetController::class, 'destroy'])->name('removePet');
    Route::put('/update/{id}', [PetController::class, 'update'])->name('atualizaPet');

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
