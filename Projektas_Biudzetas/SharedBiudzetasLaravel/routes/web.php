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
    Route::get('edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('delete/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
    Route::get('show/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
});

Route::group(['prefix' => 'budgets'], function(){
    Route::get('', [App\Http\Controllers\BudgetController::class, 'index'])->name('budget.index');
    Route::get('create/{user}', [App\Http\Controllers\BudgetController::class, 'create'])->name('budget.create');
    Route::post('store/{user}', [App\Http\Controllers\BudgetController::class, 'store'])->name('budget.store');
    Route::get('edit/{budget},{user}', [App\Http\Controllers\BudgetController::class, 'edit'])->name('budget.edit');
    Route::post('update/{budget},{user}', [App\Http\Controllers\BudgetController::class, 'update'])->name('budget.update');
    Route::get('delete/{budget},{user}', [App\Http\Controllers\BudgetController::class, 'destroy'])->name('budget.destroy');
    Route::get('show/{budget},{user}', [App\Http\Controllers\BudgetController::class, 'show'])->name('budget.show');
  });
Route::group(['prefix' => 'apsipirkimai'], function(){
    Route::get('', [App\Http\Controllers\ApsipirkimasController::class, 'index'])->name('apsipirkimas.index');
    Route::get('create/{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'create'])->name('apsipirkimas.create');
    Route::post('store/{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'store'])->name('apsipirkimas.store');
    Route::get('edit/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'edit'])->name('apsipirkimas.edit');
    Route::post('update/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'update'])->name('apsipirkimas.update');
    Route::get('delete/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'destroy'])->name('apsipirkimas.destroy');
    Route::get('show/{apsipirkimas},{budget},{user}', [App\Http\Controllers\ApsipirkimasController::class, 'show'])->name('apsipirkimas.show');
 });  