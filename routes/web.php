<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/unauthorized', fn () => view('errors.unauthorized'))->name('unauthorized');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('do_login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'signup'])->name('signup');
});

Route::prefix('produto')->name('produto.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/buscar', [ProductController::class, 'search'])->name('search');
    Route::get('/{id}/descricao', [ProductController::class, 'description'])->name('description')->where('id', '[0-9]+');

    Route::middleware('auth')->group(function () {
        Route::get('/listar', [ProductController::class, 'listProduct'])->name('list');
        Route::get('/adicionar', [ProductController::class, 'create'])->name('create');
        Route::post('/salvar', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}/exibir', [ProductController::class, 'show'])->name('show')->where('id', '[0-9]+');
        Route::get('/{id}/editar', [ProductController::class, 'edit'])->name('edit')->where('id', '[0-9]+');
        Route::post('/{id}/atualizar', [ProductController::class, 'update'])->name('update')->where('id', '[0-9]+');
        Route::post('/{id}/excluir', [ProductController::class, 'destroy'])->name('destroy')->where('id', '[0-9]+');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/perfil/atualizar', [UserController::class, 'update'])->name('user.update');
    Route::post('/perfil/foto', [UserController::class, 'updateImage'])->name('user.update_image');
});
