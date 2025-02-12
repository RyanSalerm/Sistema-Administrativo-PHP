<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicoController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('usuarios', UsuarioController::class);
Route::get('/home', [ServicoController::class, 'index'])->name('welcome');
Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos.index');
Route::get('/servicos/create', [ServicoController::class, 'create'])->name('servicos.create');
Route::post('servicos/store', [ServicoController::class, 'store'])->name('servicos.store');
Route::put('/servicos/{servico}', [ServicoController::class, 'update'])->name('servicos.update');
Route::get('/servicos/{servico}/edit', [ServicoController::class, 'edit'])->name('servicos.edit');

//Route::get('/', [LoginController::class, 'showLoginForm']);
//Route:get('login', [LoginController::class, 'index']->name('login'));
Route::get('login', [LoginController::class, 'index'])->name('login');