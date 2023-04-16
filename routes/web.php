<?php

use App\Http\Controllers\ContaController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\PetController;
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
Route::get('/pets', [PetController::class, 'index']);
Route::get('/pets/create', [PetController::class, 'create']);
Route::post('/pets/cadastrar', [PetController::class, 'store']);
Route::get('/pets/{id}', [PetController::class, 'edit']);
Route::delete('/pets/{id}', [PetController::class, 'destroy']);
Route::put('pets/update/{id}', [PetController::class, 'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
