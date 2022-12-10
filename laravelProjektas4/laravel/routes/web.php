<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Route::get('/authors/create', [App\Http\Controllers\AuthorController::class, 'create'])->name('home');
//Route::post('/authors/store', [App\Http\Controllers\AuthorController::class, 'store'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'authors'], function(){
    Route::get('', [App\Http\Controllers\AuthorController::class, 'index'])->name('author.index');
    Route::get('create', [App\Http\Controllers\AuthorController::class, 'create'])->name('author.create');
    Route::post('store', [App\Http\Controllers\AuthorController::class, 'store'])->name('author.store');
    Route::get('edit/{author}', [App\Http\Controllers\AuthorController::class, 'edit'])->name('author.edit');
    Route::post('update/{author}', [App\Http\Controllers\AuthorController::class, 'update'])->name('author.update');
    Route::post('delete/{author}', [App\Http\Controllers\AuthorController::class, 'destroy'])->name('author.destroy');
    Route::get('show/{author}', [App\Http\Controllers\AuthorController::class, 'show'])->name('author.show');
 });
 Route::group(['prefix' => 'books'], function(){
    Route::get('', [App\Http\Controllers\BookController::class, 'index'])->name('book.index');
    Route::get('create', [App\Http\Controllers\BookController::class, 'create'])->name('book.create');
    Route::post('store', [App\Http\Controllers\BookController::class, 'store'])->name('book.store');
    Route::get('edit/{book}', [App\Http\Controllers\BookController::class, 'edit'])->name('book.edit');
    Route::post('update/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('book.update');
    Route::post('/delete/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('book.destroy');
    Route::get('show/{book}', [App\Http\Controllers\BookController::class, 'show'])->name('book.show');
 });
 
 