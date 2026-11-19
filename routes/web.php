<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\CestaController;
use App\Http\Controllers\ArtigoController;

Route::get('/', [LojaController::class, 'mostrar'])->name('loja');

Route::get('/cesta', [CestaController::class, 'mostrar'])->name('cesta');
Route::post('/cesta', [CestaController::class, 'adicionar'])->name('cesta.adicionar');
Route::patch('/cesta/{artigo}', [CestaController::class, 'alterar'])->name('cesta.alterar');
Route::delete('/cesta/{artigo}', [CestaController::class, 'remover'])->name('cesta.remover');

Route::get('/artigos', [ArtigoController::class, 'index'])->name('artigos.index');
Route::post('/artigos', [ArtigoController::class, 'store'])->name('artigos.store');
Route::get('/artigos/{artigo}/editar', [ArtigoController::class, 'edit'])->name('artigos.edit');
Route::put('/artigos/{artigo}', [ArtigoController::class, 'update'])->name('artigos.update');
Route::delete('/artigos/{artigo}', [ArtigoController::class, 'destroy'])->name('artigos.destroy');
