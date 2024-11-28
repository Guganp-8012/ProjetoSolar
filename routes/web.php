<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ContateNosController;
use App\Http\Controllers\DepoimentoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\UserController;

Route::get('/', [DepoimentoController::class, 'index'])->name('homepage');

Route::get('/politica-de-privacidade', function () {return view('politica-privacidade.index');})->name('politica-privacidade.index');

Route::get('/faqs', function () {return view('FAQ.index');})->name('FAQ.index');

Route::get('/blog', [PostagemController::class, 'index'])->name('blog.index');

Route::get('/sobre', [UserController::class, 'index'])->name('empresa.sobre');

Route::get('/servicos', [DepoimentoController::class, 'servico'])->name('servico.index');

Route::get('/contatos', [ContateNosController::class, 'index'])->name('empresa.contato');
Route::post('/contatos', [ContateNosController::class, 'store'])->name('contate.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/depoimentos', [DepoimentoController::class, 'store'])->name('depoimento.store');
    Route::get('/depoimentos/{id}/edit', [DepoimentoController::class, 'edit'])->name('depoimento.edit');
    Route::put('/depoimentos/{id}', [DepoimentoController::class, 'update'])->name('depoimento.update');
    Route::delete('/depoimentos/{id}', [DepoimentoController::class, 'destroy'])->name('depoimento.destroy');

    Route::get('/categoria/cadastrar', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/categoria/{id}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::get('/categoria/{id}/update', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

    Route::get('/blog/cadastrar', [PostagemController::class, 'create'])->name('blog.create');
    Route::post('/blog', [PostagemController::class, 'store'])->name('blog.store');
    Route::get('/blog/{id}/edit', [PostagemController::class, 'edit'])->name('blog.edit');
    Route::get('/blog/{id}/update', [PostagemController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{id}', [PostagemController::class, 'destroy'])->name('blog.destroy');

    // rever e organizar rotas de comentarios

    Route::post('/blog/{postagem}/comentarios', [ComentarioController::class, 'store'])->name('comentario.store');
    Route::get('/comentarios/{comentario}/edit', [ComentarioController::class, 'edit'])->name('comentario.edit');
    Route::put('/comentarios/{comentario}', [ComentarioController::class, 'update'])->name('comentario.update');
    Route::delete('/comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('comentario.destroy');
});

Route::get('/categoria/{id}', [CategoriaController::class, 'show'])->name('categoria.show');

Route::get('/blog/{id}', [PostagemController::class, 'show'])->name('blog.detalhes');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('laravel.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
