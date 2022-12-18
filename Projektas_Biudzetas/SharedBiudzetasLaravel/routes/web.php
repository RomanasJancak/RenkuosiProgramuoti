<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'users'], function(){
    Route::get('', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    //Route::get('create', [App\Http\Controllers\BudgetController::class, 'create'])->name('budget.create');
    //Route::post('store', [App\Http\Controllers\BudgetController::class, 'store'])->name('budget.store');
    //Route::get('edit/{author}', [App\Http\Controllers\BudgetController::class, 'edit'])->name('budget.edit');
    //Route::post('update/{author}', [App\Http\Controllers\BudgetController::class, 'update'])->name('budget.update');
    //Route::post('delete/{author}', [App\Http\Controllers\BudgetController::class, 'destroy'])->name('budget.destroy');
    Route::get('show/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
 });

// Route::group(['prefix' => 'budgets'], function(){
//     Route::get('', [App\Http\Controllers\BudgetController::class, 'index'])->name('budget.index');
//     Route::get('create', [App\Http\Controllers\BudgetController::class, 'create'])->name('budget.create');
//     Route::post('store', [App\Http\Controllers\BudgetController::class, 'store'])->name('budget.store');
//     Route::get('edit/{author}', [App\Http\Controllers\BudgetController::class, 'edit'])->name('budget.edit');
//     Route::post('update/{author}', [App\Http\Controllers\BudgetController::class, 'update'])->name('budget.update');
//     Route::post('delete/{author}', [App\Http\Controllers\BudgetController::class, 'destroy'])->name('budget.destroy');
//     Route::get('show/{author}', [App\Http\Controllers\BudgetController::class, 'show'])->name('budget.show');
//  }); 