<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


//Route::get('/', [LoginController::class, 'login'])->name('login');
Auth::routes();
Route::get('/', [ServicoController::class, 'index'])->name('welcome');
Route::resource('usuarios', UsuarioController::class);
Route::get('/home', [ServicoController::class, 'index'])->name('welcome');
Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos.index');
Route::get('/servicos/create', [ServicoController::class, 'create'])->name('servicos.create');
Route::post('servicos/store', [ServicoController::class, 'store'])->name('servicos.store');
Route::put('/servicos/{servico}', [ServicoController::class, 'update'])->name('servicos.update');
Route::get('/servicos/{servico}/edit', [ServicoController::class, 'edit'])->name('servicos.edit');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
