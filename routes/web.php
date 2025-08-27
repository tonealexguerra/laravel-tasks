<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('tasks', TaskController::class);

Route::prefix('tasks')->name('tasks.')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');        // Listar tarefas
    Route::get('/create', [TaskController::class, 'create'])->name('create'); // Formulário de criação
    Route::post('/', [TaskController::class, 'store'])->name('store');        // Salvar nova tarefa
    Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('edit'); // Formulário de edição
    Route::put('/{task}', [TaskController::class, 'update'])->name('update');  // Atualizar tarefa
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('destroy'); // Remover tarefa
});




