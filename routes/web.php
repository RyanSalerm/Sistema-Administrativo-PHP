<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicoController;

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/home', [ServicoController::class, 'index'])->name('home');
Route::get('/servicos', [ServicoController::class, 'index'])->name('servicos.index');
Route::get('/servicos/create', [ServicoController::class, 'create'])->name('servicos.create');
Route::post('servicos/store', [ServicoController::class, 'store'])->name('servicos.store');
Route::put('/servicos/{servico}', [ServicoController::class, 'update'])->name('servicos.update');
Route::get('/servicos/{servico}/edit', [ServicoController::class, 'edit'])->name('servicos.edit');
