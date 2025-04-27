<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\RelatorioController;

Route::redirect('/', '/livros');

Route::resource('livros', LivroController::class)->names([
    'index' => 'livros.index',
    'create' => 'livros.create',
    'store' => 'livros.store',
    'show' => 'livros.show',
    'edit' => 'livros.edit',
    'update' => 'livros.update',
    'destroy' => 'livros.destroy',
]);

Route::resource('assuntos', AssuntoController::class)->names([
    'index' => 'assuntos.index',
    'create' => 'assuntos.create',
    'store' => 'assuntos.store',
    'show' => 'assuntos.show',
    'edit' => 'assuntos.edit',
    'update' => 'assuntos.update',
    'destroy' => 'assuntos.destroy',
]);

Route::resource('autores', AutorController::class)->names([
    'index' => 'autores.index',
    'create' => 'autores.create',
    'store' => 'autores.store',
    'show' => 'autores.show',
    'edit' => 'autores.edit',
    'update' => 'autores.update',
    'destroy' => 'autores.destroy',
]);

Route::prefix('relatorios')->name('relatorios.')->group(function () {
    Route::get('/livros-por-autor', [RelatorioController::class, 'index'])->name('livros-por-autor');
    Route::get('/exportar', [RelatorioController::class, 'exportar'])->name('exportar');
});
