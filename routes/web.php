<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\BooksController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/logout', 'destroy')->name('login.destroy');
    Route::get('/dashboard', 'dashboard')->name('login.dashboard');
});

Route::controller(StoresController::class)->group(function() {
    Route::get('/stores', 'index')->name('stores.index');
    Route::get('/stores/create', 'create')->name('stores.create');
    Route::post('/stores', 'store')->name('stores.store');  
    Route::get('/stores/{store}/edit', 'edit')->name('stores.edit');
    Route::put('/stores/{store}', 'update')->name('stores.update');
    Route::delete('/stores/{store}', 'destroy')->name('stores.destroy');
});

Route::controller(BooksController::class)->group(function() {
    Route::get('/books', 'index')->name('books.index');
    Route::get('/books/create', 'create')->name('books.create');
    Route::post('/books', 'store')->name('books.store');  
    Route::get('/books/{book}/edit', 'edit')->name('books.edit');
    Route::put('/books/{book}', 'update')->name('books.update');
    Route::delete('/books/{book}', 'destroy')->name('books.destroy');
});

