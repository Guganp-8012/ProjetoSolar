<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ContateNosController;
use App\Http\Controllers\DepoimentoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\ServicoController;

Route::get('/', function () {return view('homepage');})->name('homepage');

Route::get('/politica-de-privacidade', function () {return view('politica-privacidade.index');})->name('politica-privacidade.index');

Route::get('/faqs', [ContateNosController::class, 'index'])->name('FAQ.index');

Route::get('/blog', [PostagemController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [PostagemController::class, 'show'])->name('blog.detalhes');
Route::get('/blog/{postagem}/comentario', [ComentarioController::class, 'store'])->name('comentario.store');

Route::get('/servico', [ServicoController::class, 'index'])->name('servico.index');

Route::get('/sobre', [EmpresaController::class, 'index'])->name('empresa.sobre');
Route::get('/contatos', [EmpresaController::class, 'index'])->name('empresa.contato');
Route::post('/contatos', [ContateNosController::class, 'store'])->name('contate.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('laravel.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
