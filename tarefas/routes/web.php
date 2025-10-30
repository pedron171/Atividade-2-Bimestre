<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TarefaController;

Route::get('/', fn () => redirect()->route('tarefas.index'));

Route::resource('categorias', CategoriaController::class)->except(['show']);
Route::resource('tarefas', TarefaController::class)->except(['show']);
